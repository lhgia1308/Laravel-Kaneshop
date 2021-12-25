
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class password_resets extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("password_resets")->insert([
                        
                    ]);
                
                        }
                    }
                