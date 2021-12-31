
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class shops extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("shops")->insert([
                        ['id'=>1,'seller_id'=>'1','name'=>'Shop An Nhiên','address'=>'Vị Thanh Hậu Giang','contact'=>'0911465859','image'=>'2021-11-26-61a09d642091e.png','banner'=>'2021-11-26-61a09d642121b.png','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:40:04.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:40:04.000'))]
                    ]);
                
                        }
                    }
                