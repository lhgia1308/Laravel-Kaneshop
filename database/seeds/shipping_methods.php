
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class shipping_methods extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("shipping_methods")->insert([
                        ['id'=>1,'creator_id'=>'1','creator_type'=>'admin','title'=>'Courier','cost'=>'.00','duration'=>'4-6 days','status'=>'0','created_at'=>date('Y-m-d H:i:s', strtotime('2020-10-27 21:44:01.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2020-12-21 21:01:29.000'))],['id'=>2,'creator_id'=>'1','creator_type'=>'admin','title'=>'Company Vehicle','cost'=>'5.00','duration'=>'2 Week','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-05-26 03:57:04.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-05-26 03:57:04.000'))],['id'=>4,'creator_id'=>'1','creator_type'=>'admin','title'=>'Slow shipping','cost'=>'10.00','duration'=>'40 days','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2020-12-14 19:43:46.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-02-28 02:17:48.000'))],['id'=>5,'creator_id'=>'1','creator_type'=>'admin','title'=>'by air','cost'=>'100.00','duration'=>'2 days','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-05-26 03:57:40.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-05-26 03:57:40.000'))],['id'=>6,'creator_id'=>'10','creator_type'=>'seller','title'=>'by air','cost'=>'100.00','duration'=>'4 days','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-05-29 23:12:40.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-05-29 23:12:40.000'))],['id'=>9,'creator_id'=>'1','creator_type'=>'seller','title'=>'Standard ship','cost'=>'20.00','duration'=>'1','status'=>'2','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:44:07.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:44:07.000'))]
                    ]);
                
                        }
                    }
                