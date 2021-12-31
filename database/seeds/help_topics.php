
                <?php
                    use Illuminate\Database\Seeder;
                    use Illuminate\Support\Facades\DB;
                    
                    class help_topics extends Seeder
                    {
                        /**
                         * Run the database seeds.
                         *
                         * @return void
                         */
                        public function run()
                        {
                            
                    DB::table("help_topics")->insert([
                        ['id'=>1,'question'=>'How do I remove an item from my shopping cart?','answer'=>'To remove an item from your shopping cart, please follow these steps:

Desktop:

Step 1 - Go to your “Cart”.

Step 2 - Click on the “Bin” button to delete your item from your cart or you can add to your "Wishlist".','ranking'=>1,'status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 15:34:00.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 15:34:00.000'))],['id'=>2,'question'=>'Why am I having trouble placing products in the cart?','answer'=>'If you are having trouble placing products in your cart, the reasons could be -

The selected color/size is not available to purchase

The item is not available in stock right now.','ranking'=>1,'status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 15:34:25.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 15:34:25.000'))],['id'=>3,'question'=>'How do I know if a product comes with free installation?','answer'=>'Free installation is offered for selected products only. Be sure to check the product description of products to get more details about installation.','ranking'=>1,'status'=>'1','created_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 15:34:45.000')),'updated_at'=>date('Y-m-d H:i:s', strtotime('2021-11-26 15:34:45.000'))]
                    ]);
                
                        }
                    }
                