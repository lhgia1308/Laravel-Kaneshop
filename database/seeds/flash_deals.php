
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class flash_deals extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("flash_deals")->insert([
                        ['id'=>1,'title'=>'Flash Deal','start_date'=>date('Y-m-d H:i:s', strtotime('2021-11-25 00:00:00.000')),'end_date'=>date('Y-m-d H:i:s', strtotime('2025-11-26 00:00:00.000')),'status'=>'1','featured'=>'0','background_color'=>'','text_color'=>'','banner'=>'2021-11-26-61a0992dcc4d1.png','slug'=>'flash-deal','product_id'=>'','deal_type'=>'flash_deal','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:22:05.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:22:28.000'))],['id'=>2,'title'=>'Mega Deal','start_date'=>date('Y-m-d H:i:s', strtotime('2021-11-25 00:00:00.000')),'end_date'=>date('Y-m-d H:i:s', strtotime('2021-11-30 00:00:00.000')),'status'=>'1','featured'=>'0','background_color'=>'','text_color'=>'','banner'=>'def.png','slug'=>'mega-deal','product_id'=>'','deal_type'=>'feature_deal','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:28:54.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:29:13.000'))]
                    ]);
                
                        }
                    }
                