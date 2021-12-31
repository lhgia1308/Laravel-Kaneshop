
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class languages extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("languages")->insert([
                        ['id'=>1,'code'=>'vn','name'=>'Tiếng Việt','image'=>'2021-12-06-61add148aebe7.png','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>2,'code'=>'en','name'=>'English','image'=>'2021-12-06-61add12c3c149.png','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>3,'code'=>'zh','name'=>'Chinese','image'=>'2021-12-06-61add1548c26c.png','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))],['id'=>4,'code'=>'af','name'=>'Afghanistan','image'=>'2021-12-07-61af199a5d05f.png','created_at'=>date('Y-m-d H:i:s', strtotime('')),'updated_at'=>date('Y-m-d H:i:s', strtotime(''))]
                    ]);
                
                        }
                    }
                