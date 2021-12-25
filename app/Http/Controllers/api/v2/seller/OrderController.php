<?php

namespace App\Http\Controllers\api\v2\seller;

use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\AdminWallet;
use App\Model\BusinessSetting;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\SellerWallet;
use App\Model\ShippingMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\SellerWalletHistory;
use App\Model\AdminWalletHistory;


class OrderController extends Controller
{
    public function list(Request $request)
    {
        $data = Helpers::get_seller_by_token($request);

        if ($data['success'] == 1) {
            $seller = $data['data'];
        } else {
            return response()->json([
                'auth-001' => 'Your existing session token does not authorize you any more'
            ], 401);
        }

        $order_ids = OrderDetail::where(['seller_id' => $seller['id']])->pluck('order_id')->toArray();

        return response()->json(Order::with(['customer'])->whereIn('id', $order_ids)->get(), 200);
    }

    public function details(Request $request, $id)
    {
        $data = Helpers::get_seller_by_token($request);

        if ($data['success'] == 1) {
            $seller = $data['data'];
        } else {
            return response()->json([
                'auth-001' => 'Your existing session token does not authorize you any more'
            ], 401);
        }

        $details = OrderDetail::with(['shipping'])->where(['seller_id' => $seller['id'], 'order_id' => $id])->get();
        foreach ($details as $det) {
            $det['product_details'] = Helpers::product_data_formatting(json_decode($det['product_details'], true));
        }

        return response()->json($details, 200);
    }

    public function order_detail_status(Request $request)
    {
        $data = Helpers::get_seller_by_token($request);

        if ($data['success'] == 1) {
            $seller = $data['data'];
        } else {
            return response()->json([
                'auth-001' => 'Your existing session token does not authorize you any more'
            ], 401);
        }

        $order = OrderDetail::find($request->id);

        if (isset($order) == false) {
            return response()->json([
                'not-found' => 'Order details not found.'
            ], 404);
        }
        if ($order->delivery_status == 'delivered') {
            return response()->json(['success' => 0, 'message' => 'order is already delivered.'], 200);
        }
        $order->delivery_status = $request->delivery_status;
        $order->save();
        $data = $request->delivery_status;

        if ($order->seller_id != 0 && $request->delivery_status == 'delivered') {

            $commission = BusinessSetting::where('type', 'sales_commission')->first()->value;
            $commission_amount = (($order->price / 100) * $commission) * $order->qty;

            $shipping = ShippingMethod::find($order->shipping_method_id);
            $tax = $order->tax;
            $discount = $order->discount;
            $total = ($order->price * $order->qty) + $tax - $discount + ($shipping->creator_type == 'seller' ? $shipping->cost : 0);

            $obj = SellerWalletHistory::orderBy('id', 'desc')->first();
            $new_id = isset($obj) ? $obj->id + 1 : 1;
            DB::table('seller_wallet_histories')->insert([
                'id' => $new_id,
                'seller_id' => $order->seller_id,
                'amount' => $total - $commission_amount,
                'order_id' => $order->order_id,
                'product_id' => $order->product_id,
                'payment' => 'received',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $obj = AdminWalletHistory::orderBy('id', 'desc')->first();
            $new_id = isset($obj) ? $obj->id + 1 : 1;
            DB::table('admin_wallet_histories')->insert([
                'id' => $new_id,
                'admin_id' => Admin::where('admin_role_id', 1)->first()->id,
                'amount' => $commission_amount + ($shipping->creator_type == 'admin' ? $shipping->cost : 0),
                'order_id' => $order->order_id,
                'product_id' => $order->product_id,
                'payment' => 'received',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if (SellerWallet::where('seller_id', $order->seller_id)->first() == false) {
                $obj = SellerWallet::orderBy('id', 'desc')->first();
                $new_id = isset($obj) ? $obj->id + 1 : 1;
                DB::table('seller_wallets')->insert([
                    'id' => $new_id,
                    'seller_id' => $order->seller_id,
                    'balance' => 0,
                    'withdrawn' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            if (AdminWallet::where('admin_id', Admin::where('admin_role_id', 1)->first()->id)->first() == false) {
                $obj = AdminWallet::orderBy('id', 'desc')->first();
                $new_id = isset($obj) ? $obj->id + 1 : 1;
                DB::table('admin_wallets')->insert([
                    'id' => $new_id,
                    'admin_id' => Admin::where('admin_role_id', 1)->first()->id,
                    'balance' => 0,
                    'withdrawn' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::table('seller_wallets')->where('seller_id', $order->seller_id)->increment('balance', $total - $commission_amount);
            DB::table('admin_wallets')->where('admin_id', Admin::where('admin_role_id', 1)->first()->id)->increment('balance', $commission_amount + ($shipping->creator_type == 'admin' ? $shipping->cost : 0));

        } elseif ($order->seller_id == 0 && $request->delivery_status == 'delivered') {
            $shipping = ShippingMethod::find($order->shipping_method_id);
            $tax = $order->tax;
            $discount = $order->discount;
            $total = ($order->price * $order->qty) + $tax - $discount + $shipping->cost;

            $obj = AdminWalletHistory::orderBy('id', 'desc')->first();
            $new_id = isset($obj) ? $obj->id + 1 : 1;
            DB::table('admin_wallet_histories')->insert([
                'id' => $new_id,
                'admin_id' => Admin::where('admin_role_id', 1)->first()->id,
                'amount' => $total,
                'order_id' => $order->order_id,
                'product_id' => $order->product_id,
                'payment' => 'received',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            if (AdminWallet::where('admin_id', Admin::where('admin_role_id', 1)->first()->id)->first() == false) {
                $obj = AdminWallet::orderBy('id', 'desc')->first();
                $new_id = isset($obj) ? $obj->id + 1 : 1;
                DB::table('admin_wallets')->insert([
                    'id' => $new_id,
                    'admin_id' => Admin::where('admin_role_id', 1)->first()->id,
                    'balance' => 0,
                    'withdrawn' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            DB::table('admin_wallets')->where('admin_id', Admin::where('admin_role_id', 1)->first()->id)->increment('balance', $total);
        }

        return response()->json('Delivery status updated to ' . $data, 200);
    }
}
