<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // AdminRoleTable::class
            // admin_roles::class
            // ,admin_wallets::class
            // ,admin_wallet_histories::class
            // ,admins::class
            // ,attributes::class
            // ,banners::class
            // ,brands::class
            // ,business_settings::class
            categories::class
            // ,colors::class
            // ,coupons::class
            // ,currencies::class
            // ,deal_of_the_days::class
            // ,flash_deal_products::class
            // ,flash_deals::class
            // ,help_topics::class
            // ,languages::class
            // ,oauth_access_tokens::class
            // ,oauth_clients::class //Default Laravel generate it with auto increment ID column so don't insert it.
            // ,oauth_personal_access_clients::class //Default Laravel generate it with auto increment ID column so don't insert it.
            // ,order_details::class
            // ,orders::class
            // ,products::class
            // ,reviews::class
            // ,search_functions::class
            // ,seller_wallets::class
            // ,sellers::class
            // ,shipping_addresses::class
            // ,shipping_methods::class
            // ,shops::class
            // ,social_medias::class
            // ,translations::class
            // ,users::class
            // ,wishlists::class
        ]);
    }
}
