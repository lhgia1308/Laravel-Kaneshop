
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class deal_of_the_days extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("deal_of_the_days")->insert([
                        ['id'=>1,'title'=>'Big Sale','product_id'=>'84','discount'=>'.00','discount_type'=>'flat','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:25:44.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:28:08.000'))],['id'=>2,'title'=>'Big Sale 11','product_id'=>'86','discount'=>'10.00','discount_type'=>'flat','status'=>'0','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:27:13.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:28:08.000'))]
                    ]);
                
                        }
                    }
                