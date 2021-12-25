
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class shipping_addresses extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("shipping_addresses")->insert([
                        ['id'=>'1','customer_id'=>'1','contact_person_name'=>'Hà Anh Tuấn','address_type'=>'home','address'=>'117 Phường V, TP Vị Thanh','city'=>'ABC','zip'=>'95000','phone'=>'0911465859','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-27 13:57:17')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-27 13:57:17')),'state'=>'','country'=>'Việt Nam'],['id'=>'2','customer_id'=>'0','contact_person_name'=>'Lê Hoàng Việt','address_type'=>'permanent','address'=>'117 Phường V, TP Vị Thanh','city'=>'ABC','zip'=>'95000','phone'=>'0911445595','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-27 14:16:14')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-27 14:16:14')),'state'=>'','country'=>'Việt Nam']
                    ]);
                
                        }
                    }
                