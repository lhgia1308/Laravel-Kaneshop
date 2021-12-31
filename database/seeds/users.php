
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class users extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("users")->insert([
                        ['id'=>1,'name'=>'','f_name'=>'Tuấn','l_name'=>'Hà','phone'=>'091446525','image'=>'def.png','email'=>'hatuan@gmail.com','email_verified_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'password'=>'$2y$10$Fxe.LOHOz4siTv1pRxLz.uhQ5xfHljoarom01ySktLp3mqqGzdTQy','remember_token'=>'IlgxqoyJPh4YlistnnN0acU6BiGez7fhc64LdnuE0NmYtHj8rczCl3fS0PQY','street_address'=>'','country'=>'','city'=>'','zip'=>'','house_no'=>'','apartment_no'=>'','cm_firebase_token'=>'','is_active'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-27 14:08:47.000'))],['id'=>2,'name'=>'','f_name'=>'Việt','l_name'=>'Lê','phone'=>'0911445595','image'=>'def.png','email'=>'lhviet1502@gmail.com','email_verified_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'password'=>'$2y$10$AgW.JvCOIQ.SSdoPE3hkz.KLAPec96Zg.dXzRVfVf54vhRvaOtPJO','remember_token'=>'sObRlUMkA0EOwiSLrOyx5ZaUNU6dna0kUr8S9cdWtBHfPdsArBtnLW3WgFIG','street_address'=>'','country'=>'','city'=>'','zip'=>'','house_no'=>'','apartment_no'=>'','cm_firebase_token'=>'','is_active'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))]
                    ]);
                
                        }
                    }
                