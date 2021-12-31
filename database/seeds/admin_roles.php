
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class admin_roles extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("admin_roles")->insert([
                        ['id'=>1,'name'=>'Master Admin','module_access'=>'','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>7,'name'=>'Seller','module_access'=>'["order","product"]','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:22:02.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:22:02.000'))]
                    ]);
                
                        }
                    }
                