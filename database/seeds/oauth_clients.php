
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class oauth_clients extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("oauth_clients")->insert([
                        ['id'=>1,'user_id'=>'','name'=>'6amtech','secret'=>'GEUx5tqkviM6AAQcz4oi1dcm1KtRdJPgw41lj0eI','redirect'=>'http://localhost','personal_access_client'=>'1','password_client'=>'0','revoked'=>'0','created_at'=>date('Y-m-d H:i:s', strtotime('2020-10-22 01:27:22')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2020-10-22 01:27:22'))]
                    ]);
                
                        }
                    }
                