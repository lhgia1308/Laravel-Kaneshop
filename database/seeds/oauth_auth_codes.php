
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class oauth_auth_codes extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("oauth_auth_codes")->insert([
                        
                    ]);
                
                        }
                    }
                