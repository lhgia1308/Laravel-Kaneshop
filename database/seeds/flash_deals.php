
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
                        ['id'=>'1','title'=>'Flash Deal','start_date'=>'2021-11-25','end_date'=>'2025-11-26','status'=>'1','featured'=>'0','background_color'=>'','text_color'=>'','banner'=>'2021-11-26-61a0992dcc4d1.png','slug'=>'flash-deal','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:22:05')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:22:28')),'product_id'=>NULL,'deal_type'=>'flash_deal'],['id'=>'2','title'=>'Mega Deal','start_date'=>'2021-11-25','end_date'=>'2021-11-30','status'=>'1','featured'=>'0','background_color'=>'','text_color'=>'','banner'=>'def.png','slug'=>'mega-deal','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:28:54')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:29:13')),'product_id'=>NULL,'deal_type'=>'feature_deal']
                    ]);
                
                        }
                    }
                