<?php

namespace App\Http\Controllers\Admin;

use App\CPU\Helpers;
use App\CPU\OrderManager;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\AdminWallet;
use App\Model\BusinessSetting;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Product;
use App\Model\SellerWallet;
use App\Model\ShippingMethod;
use Barryvdh\DomPDF\Facade as PDF;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\CPU\WorkerThread;
use Illuminate\Support\Facades\Response;
use Spipu\Html2Pdf\Html2Pdf;
use Carbon\Carbon;
class OrderController extends Controller
{
    public function list($status)
    {
        if (session()->has('show_inhouse_orders') && session('show_inhouse_orders') == 1) {
            $data = OrderDetail::where(['seller_id' => 0])->pluck('order_id')->toArray();
            $query = Order::with(['customer'])->whereIn('id', array_unique($data));
            if ($status != 'all') {
                $orders = $query->where(['order_status' => $status]);
            } else {
                $orders = $query;
            }
        } else {
            if ($status != 'all') {//Filter list follow order status
                $orders = Order::with(['customer'])->where(['order_status' => $status]);
            } else {//Get all order 
                $orders = Order::with(['customer']);
            }
        }

        $statistic = BusinessSetting::where('type', 'default_statistic_type')->first();

        if(!isset($statistic)) {
            $orders = $orders->latest()->paginate(25);
        }
        else {
            $type = $statistic['value'];
            if(session()->has('order_list_statistic')) {
                $type = session('order_list_statistic');
            }
            switch ($type) {
                case 'current_day':
                    $orders = $orders->whereDate('created_at', Carbon::today())->latest()->paginate(25);
                    break;
                case 'current_month':
                    $orders = $orders->whereMonth('created_at', Carbon::now())->latest()->paginate(25);
                    break;
                case 'current_year':
                    $orders = $orders->whereYear('created_at', Carbon::now())->latest()->paginate(25);
                    break;
                case 'option_day':
                    $from_day = session('from_day_statistic');
                    $to_day = session('to_day_statistic');
                    $today1 = $to_day.' 23:59:59';
                    $orders = $orders->whereBetween('created_at', [$from_day, $today1])->latest()->paginate(25);
                    break;
                default:
                    $orders = $orders->latest()->paginate(25);
                    break;
            }
        }

        return view('admin-views.order.list', compact('orders'));
    }

    public function order_statistic_list(Request $request) {
        // echo "from_day: ".strtotime($request['from_day']) . ", to_day: " .$request["to_day"];
        // return;
        session()->put('order_list_statistic', $request['val']);
        session()->put('from_day_statistic', $request['from_day']);
        session()->put('to_day_statistic', $request['to_day']);
        return back();
    }

    public function details($id)
    {
        $order = Order::with('details', 'details.shipping', 'shipping', 'seller')->where(['id' => $id])->first();
        return view('admin-views.order.order-details', compact('order'));
    }

    public function status(Request $request)
    {
        $order = Order::find($request->id);
        $fcm_token = $order->customer->cm_firebase_token;
        $value = Helpers::order_status_update_message($request->order_status);
        try {
            if ($value) {
                $data = [
                    'title' => 'Order',
                    'description' => $value,
                    'order_id' => $order['id'],
                    'image' => '',
                ];
                Helpers::send_push_notif_to_device($fcm_token, $data);
            }
        } catch (\Exception $e) {
            return response()->json([]);
        }

        $order->order_status = $request->order_status;
        OrderManager::stock_update_on_order_status_change($order, $request->order_status);

        $order->save();
        $data = $request->order_status;
        return response()->json($data);
    }

    public function payment_status(Request $request)
    {
        if ($request->ajax()) {
            $order = Order::find($request->id);
            $order->payment_status = $request->payment_status;
            $order->save();
            $data = $request->payment_status;
            return response()->json($data);
        }
    }

    public function productStatus(Request $request)
    {
        $order = OrderDetail::find($request->id);
        if ($order->delivery_status == 'delivered') {
            return response()->json(['success' => 0, 'message' => 'order is already delivered.'], 200);
        }
        $order->delivery_status = $request->delivery_status;
        OrderManager::stock_update_on_product_status_change($order, $request->delivery_status);
        $order->save();

        if ($request->delivery_status == 'delivered') {
            $complete = true;
            foreach (OrderDetail::where(['order_id' => $order['order_id']])->get() as $order) {
                if ($order['delivery_status'] != 'delivered') {
                    $complete = false;
                }
            }
            if ($complete) {
                Order::where(['id' => $order['order_id']])->update([
                    'order_status' => 'delivered',
                    'updated_at' => now()
                ]);
            }
        }

        $data = $request->delivery_status;
        OrderManager::wallet_manage_on_order_status_change($order, $request);

        return response()->json($data);
    }

    public function update_status(Request $request) {
        if(count($request['ids']) > 0) {
            // var_dump(count($id_arr));
            foreach($request['ids'] as $id) {
                $data = $data1 = [];

                if($request['status']!="") {
                    $data = array_merge($data, array('payment_status' => $request['status']));
                    $data1 = array_merge($data1, array('payment_status' => $request['status']));
                }
                if($request['order_status']!="") {
                    $data = array_merge($data, array('order_status' => $request['order_status']));
                    $data1 = array_merge($data1, array('delivery_status' => $request['order_status']));
                }
                
                Order::where('id', $id)->update($data);
                OrderDetail::where('order_id', $id)->update($data1);
            }
        }
        return response()->json([
            'statusCode' => 200,
        ]);
    }

    public function generate_invoice($id)
    {
        $order = Order::with('shipping')->where('id', $id)->first();
        // dd($order)->toArray();

        $data["email"] = $order->customer["email"];
        $data["client_name"] = $order->customer["f_name"] . ' ' . $order->customer["l_name"];
        $data["order"] = $order;
        //return view('admin-views.order.invoice', compact('order'));
        $pdf = PDF::loadView('admin-views.order.invoice', $data);
        return $pdf->download($order->id . '.pdf');
    }

    function view_invoice($id)
    {
        $pdf = App::make('dompdf.wrapper');

        $pdf->loadHTML($this->get_invoice_html($id))
            ->setPaper('a4', 'portrait')//portrait, landscape
            ->setWarnings(false);
            // ->setOptions(['dpi' => 150]);

        return $pdf->stream('inv_'.$id.'.pdf');

        //2/The 2th way
        // $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8');
        // // $html2pdf->setDefaultFont('arialunicid0'); //or cid0jp
        // $html2pdf->pdf->SetDisplayMode('fullpage');
        // $content = '<page style="font-family: DejaVu Sans, serif"><br />'.'<h1>Việt Lê</h1>'.'</page>';
        // $html2pdf->writeHTML($content);
        // $html2pdf->output($id.'.pdf');
    }

    function get_invoice_html($id)
    {
        $order = Order::with('shipping')->where('id', $id)->first();
        return view('admin-views.order.invoice', compact('order'));
    }

    public function inhouse_order_filter()
    {
        if (session()->has('show_inhouse_orders') && session('show_inhouse_orders') == 1) {
            session()->put('show_inhouse_orders', 0);
        } else {
            session()->put('show_inhouse_orders', 1);
        }
        return back();
    }
}
