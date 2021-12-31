
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class currencies extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("currencies")->insert([
                        ['id'=>1,'name'=>'USD','symbol'=>'$','code'=>'USD','exchange_rate'=>'4.484304','status'=>'1','position'=>'left','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-12-20 20:31:49.000'))],['id'=>2,'name'=>'BDT','symbol'=>'৳','code'=>'BDT','exchange_rate'=>'0.0038181818181818','status'=>'1','position'=>'','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-12-20 20:16:55.000'))],['id'=>3,'name'=>'Indian Rupi','symbol'=>'₹','code'=>'INR','exchange_rate'=>'0.0027272727272727','status'=>'1','position'=>'','created_at'=>date('Y-m-d H:i:s', strtotime('2020-10-16 00:23:04.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-12-20 20:16:55.000'))],['id'=>4,'name'=>'Euro','symbol'=>'€','code'=>'EUR','exchange_rate'=>'0.00454545','status'=>'1','position'=>'left','created_at'=>date('Y-m-d H:i:s', strtotime('2021-05-26 04:00:23.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-12-20 20:19:57.000'))],['id'=>5,'name'=>'YEN','symbol'=>'¥','code'=>'JPY','exchange_rate'=>'0.005','status'=>'1','position'=>'left','created_at'=>date('Y-m-d H:i:s', strtotime('2021-06-11 05:08:31.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-12-20 20:19:22.000'))],['id'=>6,'name'=>'Ringgit','symbol'=>'RM','code'=>'MYR','exchange_rate'=>'0.00018909090909091','status'=>'1','position'=>'','created_at'=>date('Y-m-d H:i:s', strtotime('2021-07-03 18:08:33.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-12-20 20:16:55.000'))],['id'=>7,'name'=>'Rand','symbol'=>'R','code'=>'ZAR','exchange_rate'=>'0.00064818181818182','status'=>'1','position'=>'','created_at'=>date('Y-m-d H:i:s', strtotime('2021-07-03 18:12:38.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-12-20 20:16:55.000'))],['id'=>8,'name'=>'VND','symbol'=>'đ','code'=>'VND','exchange_rate'=>'1','status'=>'1','position'=>'right','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 15:23:49.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-12-20 20:20:21.000'))]
                    ]);
                
                        }
                    }
                