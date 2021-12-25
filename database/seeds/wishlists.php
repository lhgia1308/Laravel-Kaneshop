
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class wishlists extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("wishlists")->insert([
                        ['id'=>'1','customer_id'=>'1','product_id'=>'88','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 15:45:20')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 15:45:20'))],['id'=>'2','customer_id'=>'1','product_id'=>'87','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 15:45:37')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 15:45:37'))],['id'=>'3','customer_id'=>'2','product_id'=>'91','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-27 14:53:18')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-27 14:53:18'))]
                    ]);
                
                        }
                    }
                