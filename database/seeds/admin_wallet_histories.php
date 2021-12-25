
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class admin_wallet_histories extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("admin_wallet_histories")->insert([
                        ['id'=>'1','admin_id'=>'1','amount'=>'186.56','order_id'=>'100002','product_id'=>'87','payment'=>'received','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-27 14:20:39')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-27 14:20:39'))]
                    ]);
                
                        }
                    }
                