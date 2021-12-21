<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminWalletTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = DB::table('admin_wallets')->where(['admin_id' => 1, 'balance' => 401.36])->first();
        if(!isset($data)) {
            DB::table('admin_wallets')->insert([
                'admin_id' => 1
                ,'balance' => 401.36
                ,'withdrawn' => 0
                ,'created_at' => now()
                ,'updated_at' => now()
            ]);
        }
    }
}
