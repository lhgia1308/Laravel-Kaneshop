
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class brands extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("brands")->insert([
                        ['id'=>1,'name'=>'Tell Us','image'=>'2021-11-26-61a05da5369ce.png','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:08:05.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:08:05.000'))],['id'=>2,'name'=>'The Wall','image'=>'2021-11-26-61a05dd03b659.png','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:08:48.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:08:48.000'))],['id'=>3,'name'=>'Dynamova','image'=>'2021-11-26-61a05deb3e5bb.png','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:09:15.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:09:15.000'))],['id'=>4,'name'=>'Crave','image'=>'2021-11-26-61a05e0097fab.png','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:09:36.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:09:36.000'))],['id'=>5,'name'=>'Arkohub','image'=>'2021-11-26-61a05e12be863.png','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:09:54.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:09:54.000'))],['id'=>6,'name'=>'Axxelus','image'=>'2021-11-26-61a05e2d9011b.png','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:10:21.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:10:21.000'))],['id'=>7,'name'=>'Market Miracle','image'=>'2021-11-26-61a05e41ba570.png','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:10:41.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:10:41.000'))],['id'=>8,'name'=>'Vivatiqo','image'=>'2021-11-26-61a05e56a71c1.png','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:11:02.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:11:02.000'))],['id'=>9,'name'=>'TrueMake','image'=>'2021-11-26-61a05e67ed010.png','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:11:19.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:11:19.000'))],['id'=>10,'name'=>'Hexanate','image'=>'2021-11-26-61a05e7f6764f.png','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:11:43.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:11:43.000'))],['id'=>11,'name'=>'Modentum','image'=>'2021-11-26-61a05e903edcd.png','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:12:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:12:00.000'))],['id'=>12,'name'=>'Framerce','image'=>'2021-11-26-61a05ea81a2da.png','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:12:24.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:12:24.000'))],['id'=>13,'name'=>'Center Point','image'=>'2021-11-26-61a05ebc9ca11.png','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:12:44.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:12:44.000'))],['id'=>14,'name'=>'Yo Merce','image'=>'2021-11-26-61a05ed20d8d7.png','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:13:06.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:13:06.000'))],['id'=>15,'name'=>'Great Hall','image'=>'2021-11-26-61a05ee62c21f.png','status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:13:26.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 10:13:26.000'))]
                    ]);
                
                        }
                    }
                