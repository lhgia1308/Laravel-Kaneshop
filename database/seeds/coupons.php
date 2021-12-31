
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class coupons extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("coupons")->insert([
                        ['id'=>1,'coupon_type'=>'discount_on_purchase','title'=>'test 111','code'=>'tR1X3NBBAF','start_date'=>date('Y-m-d H:i:s', strtotime('2021-11-26 00:00:00.000')),'expire_date'=>date('Y-m-d H:i:s', strtotime('2021-12-01 00:00:00.000')),'min_purchase'=>'10.00','max_discount'=>'10.00','discount'=>'10.00','discount_type'=>'amount','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:19:32.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:19:32.000'))]
                    ]);
                
                        }
                    }
                