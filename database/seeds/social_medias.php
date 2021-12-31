
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class social_medias extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("social_medias")->insert([
                        ['id'=>1,'name'=>'twitter','link'=>'https://www.w3schools.com/howto/howto_css_table_responsive.asp','icon'=>'fa fa-twitter','active_status'=>1,'status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-01-01 04:18:03.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-01-01 04:18:25.000'))],['id'=>2,'name'=>'linkedin','link'=>'https://dev.6amtech.com/','icon'=>'fa fa-linkedin','active_status'=>1,'status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-02-27 23:23:01.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-02-27 23:23:05.000'))],['id'=>3,'name'=>'google-plus','link'=>'https://dev.6amtech.com/','icon'=>'fa fa-google-plus-square','active_status'=>1,'status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-02-27 23:23:30.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-02-27 23:23:33.000'))],['id'=>4,'name'=>'pinterest','link'=>'https://dev.6amtech.com/','icon'=>'fa fa-pinterest','active_status'=>1,'status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-02-27 23:24:14.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-02-27 23:24:26.000'))],['id'=>5,'name'=>'instagram','link'=>'https://dev.6amtech.com/','icon'=>'fa fa-instagram','active_status'=>1,'status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-02-27 23:24:36.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-02-27 23:24:41.000'))],['id'=>6,'name'=>'facebook','link'=>'https://facebook.com','icon'=>'fa fa-facebook','active_status'=>1,'status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-02-28 02:19:42.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 15:37:30.000'))]
                    ]);
                
                        }
                    }
                