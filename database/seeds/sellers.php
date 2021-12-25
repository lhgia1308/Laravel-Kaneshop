
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class sellers extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("sellers")->insert([
                        ['id'=>'1','f_name'=>'Seller test 1','l_name'=>'Le','phone'=>'0911465859','image'=>'2021-11-26-61a09d6403837.png','email'=>'sellertest1@gmail.com','password'=>'$2y$10$vr9682vSq4vuIGMJ0UjS4uVZjspMNpdAcwnfycpWCekJ3vkgAz41O','status'=>'approved','remember_token'=>'','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:40:04')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:41:43')),'bank_name'=>'','branch'=>'','account_no'=>'','holder_name'=>'','auth_token'=>'','sales_commission_percentage'=>'']
                    ]);
                
                        }
                    }
                