
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class orders extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("orders")->insert([
                        ['id'=>'100001','customer_id'=>'1','customer_type'=>'customer','payment_status'=>'unpaid','order_status'=>'pending','payment_method'=>'cash_on_delivery','transaction_ref'=>'','order_amount'=>'70.48','shipping_address'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-27 13:57:17')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-27 13:57:25')),'discount_amount'=>'10','discount_type'=>'coupon_discount'],['id'=>'100002','customer_id'=>'2','customer_type'=>'customer','payment_status'=>'unpaid','order_status'=>'delivered','payment_method'=>'cash_on_delivery','transaction_ref'=>'','order_amount'=>'186.56','shipping_address'=>'2','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-27 14:16:14')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-27 14:20:39')),'discount_amount'=>'0','discount_type'=>'']
                    ]);
                
                        }
                    }
                