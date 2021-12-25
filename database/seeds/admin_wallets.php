
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class admin_wallets extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("admin_wallets")->insert([
                        ['id'=>'1','admin_id'=>'1','balance'=>'401.36','withdrawn'=>'0','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))]
                    ]);
                
                        }
                    }
                