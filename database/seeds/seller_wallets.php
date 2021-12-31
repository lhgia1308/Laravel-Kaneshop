
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class seller_wallets extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("seller_wallets")->insert([
                        ['id'=>1,'seller_id'=>'1','balance'=>'0.0','withdrawn'=>'0.0','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:42:03.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:42:03.000'))]
                    ]);
                
                        }
                    }
                