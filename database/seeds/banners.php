
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class banners extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("banners")->insert([
                        ['id'=>'1','photo'=>'2021-11-26-61a0977c160d2.png','banner_type'=>'Main Banner','published'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:14:52')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:15:36')),'url'=>'http://localhost/kaneshop/'],['id'=>'2','photo'=>'2021-11-26-61a0978573bc9.png','banner_type'=>'Main Banner','published'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:15:01')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:15:35')),'url'=>'http://localhost/kaneshop/'],['id'=>'3','photo'=>'2021-11-26-61a0978c945dd.png','banner_type'=>'Main Banner','published'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:15:08')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:15:35')),'url'=>'http://localhost/kaneshop/'],['id'=>'4','photo'=>'2021-11-26-61a0979847059.png','banner_type'=>'Main Banner','published'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:15:20')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:15:34')),'url'=>'http://localhost/kaneshop/'],['id'=>'5','photo'=>'2021-11-26-61a097c67502a.png','banner_type'=>'Footer Banner','published'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:16:06')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:16:42')),'url'=>'http://localhost/kaneshop/'],['id'=>'6','photo'=>'2021-11-26-61a097cd48b68.png','banner_type'=>'Footer Banner','published'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:16:13')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:16:42')),'url'=>'http://localhost/kaneshop/'],['id'=>'7','photo'=>'2021-11-26-61a097d444ff4.png','banner_type'=>'Footer Banner','published'=>1,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:16:20')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:16:41')),'url'=>'http://localhost/kaneshop/'],['id'=>'8','photo'=>'2021-11-26-61a097dd19941.png','banner_type'=>'Popup Banner','published'=>NULL,'created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 14:16:29')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-27 13:16:53')),'url'=>'http://localhost/kaneshop/']
                    ]);
                
                        }
                    }
                