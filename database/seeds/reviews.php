
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class reviews extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("reviews")->insert([
                        ['id'=>'1','product_id'=>'23','customer_id'=>'97','comment'=>'good','attachment'=>'["review\/GZznygozmDapxWtpb1jmFucm51aoRTzAVu4iQyDK.jpg"]','rating'=>5,'status'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-06-04 18:55:16')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-06-04 18:55:16'))],['id'=>'2','product_id'=>'34','customer_id'=>'97','comment'=>'good','attachment'=>'[]','rating'=>1,'status'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-06-04 23:47:53')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-06-04 23:47:53'))],['id'=>'3','product_id'=>'34','customer_id'=>'97','comment'=>'okay','attachment'=>'[]','rating'=>5,'status'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-06-05 04:24:51')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-06-05 04:24:51'))],['id'=>'4','product_id'=>'41','customer_id'=>'97','comment'=>'oka','attachment'=>'[]','rating'=>1,'status'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-06-05 04:34:09')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-06-05 04:34:09'))],['id'=>'5','product_id'=>'40','customer_id'=>'97','comment'=>'great','attachment'=>'["review\/pqXIjC40O8rYU7WFBwQaMUD32ObIObvKCRssLdF6.jpg"]','rating'=>1,'status'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-06-05 04:36:56')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-06-05 04:36:56'))],['id'=>'6','product_id'=>'1','customer_id'=>'101','comment'=>'Nice','attachment'=>'["review\/DQh9xsD7fiyjheN9qOI6gXmFwEXrRebHzuliR4lY.jpg"]','rating'=>1,'status'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-06-05 04:42:05')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-06-05 04:42:05'))],['id'=>'7','product_id'=>'40','customer_id'=>'97','comment'=>'very 5','attachment'=>'[]','rating'=>5,'status'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-06-05 04:42:41')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-06-05 04:42:41'))],['id'=>'8','product_id'=>'40','customer_id'=>'97','comment'=>'okaaaa','attachment'=>'[]','rating'=>4,'status'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-06-05 05:27:09')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-06-05 05:27:09'))],['id'=>'9','product_id'=>'41','customer_id'=>'97','comment'=>'abcd123','attachment'=>'[]','rating'=>4,'status'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-06-05 05:28:31')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-06-05 05:28:31'))],['id'=>'10','product_id'=>'87','customer_id'=>'2','comment'=>'Good','attachment'=>'[]','rating'=>2,'status'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-27 14:23:14')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-27 14:23:14'))]
                    ]);
                
                        }
                    }
                