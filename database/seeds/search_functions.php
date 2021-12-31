
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class search_functions extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("search_functions")->insert([
                        ['id'=>1,'key'=>'Dashboard','url'=>'admin/dashboard','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>2,'key'=>'Order All','url'=>'admin/orders/list/all','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>3,'key'=>'Order Pending','url'=>'admin/orders/list/pending','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>4,'key'=>'Order Processed','url'=>'admin/orders/list/processed','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>5,'key'=>'Order Delivered','url'=>'admin/orders/list/delivered','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>6,'key'=>'Order Returned','url'=>'admin/orders/list/returned','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>7,'key'=>'Order Failed','url'=>'admin/orders/list/failed','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>8,'key'=>'Brand Add','url'=>'admin/brand/add-new','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>9,'key'=>'Brand List','url'=>'admin/brand/list','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>10,'key'=>'Banner','url'=>'admin/banner/list','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>11,'key'=>'Category','url'=>'admin/category/view','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>12,'key'=>'Sub Category','url'=>'admin/category/sub-category/view','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>13,'key'=>'Sub sub category','url'=>'admin/category/sub-sub-category/view','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>14,'key'=>'Attribute','url'=>'admin/attribute/view','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>15,'key'=>'Product','url'=>'admin/product/list','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>16,'key'=>'Coupon','url'=>'admin/coupon/add-new','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>17,'key'=>'Custom Role','url'=>'admin/custom-role/create','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>18,'key'=>'Employee','url'=>'admin/employee/add-new','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>19,'key'=>'Seller','url'=>'admin/sellers/seller-list','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>20,'key'=>'Contacts','url'=>'admin/contact/list','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>21,'key'=>'Flash Deal','url'=>'admin/deal/flash','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>22,'key'=>'Deal of the day','url'=>'admin/deal/day','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>23,'key'=>'Language','url'=>'admin/business-settings/language','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>24,'key'=>'Mail','url'=>'admin/business-settings/mail','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>25,'key'=>'Shipping method','url'=>'admin/business-settings/shipping-method/add','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>26,'key'=>'Currency','url'=>'admin/currency/view','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>27,'key'=>'Payment method','url'=>'admin/business-settings/payment-method','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>28,'key'=>'SMS Gateway','url'=>'admin/business-settings/sms-gateway','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>29,'key'=>'Support Ticket','url'=>'admin/support-ticket/view','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>30,'key'=>'FAQ','url'=>'admin/helpTopic/list','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>31,'key'=>'About Us','url'=>'admin/business-settings/about-us','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>32,'key'=>'Terms and Conditions','url'=>'admin/business-settings/terms-condition','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))],['id'=>33,'key'=>'Web Config','url'=>'admin/business-settings/web-config','visible_for'=>'admin','created_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('1970-01-01 06:00:00.000'))]
                    ]);
                
                        }
                    }
                