
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class customer_wallet_histories extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("customer_wallet_histories")->insert([
                        
                    ]);
                
                        }
                    }
                