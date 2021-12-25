
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
                        ['id'=>'1','coupon_type'=>'discount_on_purchase','title'=>'test 111','code'=>'tR1X3NBBAF','start_date'=>'2021-11-26','expire_date'=>'2021-12-01','min_purchase'=>'10.00','max_discount'=>'10.00','discount'=>'10.00','discount_type'=>'amount','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:19:32')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:19:32'))]
                    ]);
                
                        }
                    }
                