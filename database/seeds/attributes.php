
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class attributes extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("attributes")->insert([
                        ['id'=>'1','name'=>'Size','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:43:55')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:43:55'))]
                    ]);
                
                        }
                    }
                