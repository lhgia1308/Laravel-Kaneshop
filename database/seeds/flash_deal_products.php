
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class flash_deal_products extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("flash_deal_products")->insert([
                        ['id'=>1,'flash_deal_id'=>'1','product_id'=>'85','discount'=>'.00','discount_type'=>'','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:23:49.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:23:49.000'))],['id'=>2,'flash_deal_id'=>'1','product_id'=>'82','discount'=>'.00','discount_type'=>'','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:23:54.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:23:54.000'))],['id'=>3,'flash_deal_id'=>'1','product_id'=>'87','discount'=>'.00','discount_type'=>'','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:23:57.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:23:57.000'))],['id'=>4,'flash_deal_id'=>'2','product_id'=>'83','discount'=>'.00','discount_type'=>'','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:29:06.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:29:06.000'))],['id'=>5,'flash_deal_id'=>'2','product_id'=>'85','discount'=>'.00','discount_type'=>'','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:29:40.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:29:40.000'))],['id'=>6,'flash_deal_id'=>'2','product_id'=>'86','discount'=>'.00','discount_type'=>'','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:29:46.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:29:46.000'))]
                    ]);
                
                        }
                    }
                