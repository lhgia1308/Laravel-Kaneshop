<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class AdminRoleTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = DB::table('admin_roles')->where('name', 'Master Admin')->first();
        if(!isset($data)) {
            DB::table('admin_roles')->insert([
                'name' => 'Master Admin'
                ,'module_access' => null
                ,'status' => 1
                ,'created_at'=>now()
                ,'updated_at'=>now()
            ]);
        }

        $data = DB::table('admin_roles')->where('name', 'Seller')->first();
        if(!isset($data)) {
            DB::table('admin_roles')->insert([
                'name' => 'Seller'
                ,'module_access' => '["order","product"]'
                ,'status' => 1
                ,'created_at'=>now()
                ,'updated_at'=>now()
            ]);
        }
    }
}
