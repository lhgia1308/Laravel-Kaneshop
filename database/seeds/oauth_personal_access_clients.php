
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class oauth_personal_access_clients extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("oauth_personal_access_clients")->insert([
                        ['id'=>1,'client_id'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2020-10-22 01:27:23')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2020-10-22 01:27:23'))]
                    ]);
                
                        }
                    }
                