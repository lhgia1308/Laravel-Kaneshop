
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class admins extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("admins")->insert([
                        ['id'=>'1','name'=>'Kane Le','phone'=>'0911445595','admin_role_id'=>'1','image'=>'def.png','email'=>'lhgia1308@gmail.com','email_verified_at'=>date('Y-m-d H:i:s', strtotime('')),'password'=>'$2y$10$aACTv4DDD6Ieon9Mh1Vy3eX/jzpgCac2HbUiU0nrXc4gagi4D0al6','remember_token'=>'','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-24 21:03:15')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-24 21:03:15'))],['id'=>'2','name'=>'Phạm Văn Thuyền','phone'=>'0911465859','admin_role_id'=>'7','image'=>'2021-11-26-61a0624ac8d39.png','email'=>'pvthuyen68@gmail.com','email_verified_at'=>date('Y-m-d H:i:s', strtotime('')),'password'=>'$2y$10$YI.L.YeXYbyyUr/J1T9LauCefdo1rnYKJEJPhHnv0//C1rA8Xa8UK','remember_token'=>'','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:27:54')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:27:54'))]
                    ]);
                
                        }
                    }
                