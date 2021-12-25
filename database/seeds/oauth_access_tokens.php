
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class oauth_access_tokens extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("oauth_access_tokens")->insert([
                        ['id'=>'6840b7d4ed685bf2e0dc593affa0bd3b968065f47cc226d39ab09f1422b5a1d9666601f3f60a79c1','user_id'=>'98','client_id'=>1,'name'=>'LaravelAuthApp','scopes'=>'[]','revoked'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-07-05 16:25:41')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-07-05 16:25:41')),'expires_at'=>date('Y-m-d H:i:s', strtotime('2022-07-05 15:25:41'))],['id'=>'c42cdd5ae652b8b2cbac4f2f4b496e889e1a803b08672954c8bbe06722b54160e71dce3e02331544','user_id'=>'98','client_id'=>1,'name'=>'LaravelAuthApp','scopes'=>'[]','revoked'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-07-05 16:24:36')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-07-05 16:24:36')),'expires_at'=>date('Y-m-d H:i:s', strtotime('2022-07-05 15:24:36'))]
                    ]);
                
                        }
                    }
                