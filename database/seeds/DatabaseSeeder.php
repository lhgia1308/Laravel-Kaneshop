
                <?php
                use Illuminate\Database\Seeder;

                class DatabaseSeeder extends Seeder
                {
                    public function run()
                    {
                        $this->call([
                            admin_roles::class,
admin_wallet_histories::class,
admin_wallets::class,
admins::class,
attributes::class,
banners::class,
brands::class,
business_settings::class,
categories::class,
chattings::class,
colors::class,
contacts::class,
coupons::class,
currencies::class,
customer_wallet_histories::class,
customer_wallets::class,
deal_of_the_days::class,
failed_jobs::class,
feature_deals::class,
flash_deal_products::class,
flash_deals::class,
help_topics::class,
languages::class,
notifications::class,
order_details::class,
orders::class,
product_stocks::class,
products::class,
reviews::class,
search_functions::class,
seller_wallet_histories::class,
seller_wallets::class,
sellers::class,
shipping_addresses::class,
shipping_methods::class,
shops::class,
social_medias::class,
support_ticket_convs::class,
support_tickets::class,
transactions::class,
translations::class,
users::class,
wishlists::class
                        ]);
                    }
                }
            