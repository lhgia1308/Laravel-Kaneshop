<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = DB::table('admins')->where('name', 'Kane Le')->first();
        if(!isset($data)) {
            DB::table('admins')->insert([
                'name' => 'Kane Le'
                ,'phone' => '0942997754'
                ,'admin_role_id' => 1
                ,'image' => 'def.png'
                ,'email' => 'lhgia1308@gmail.com'
                ,'password' => bcrypt(12345678)
                ,'remember_token' =>Str::random(10)
                ,'created_at'=>now()
                ,'updated_at'=>now()
            ]);
        }

        $data = DB::table('admins')->where('name', 'Phạm Văn Thuyền')->first();
        if(!isset($data)) {
            DB::table('admins')->insert([
                'name' => 'Phạm Văn Thuyền'
                ,'phone' => '0911465859'
                ,'admin_role_id' => 7
                ,'image' => '2021-11-26-61a0624ac8d39.png'
                ,'email' => 'pvthuyen68@gmail.com'
                ,'password' => bcrypt(12345678)
                ,'remember_token' =>Str::random(10)
                ,'created_at'=>now()
                ,'updated_at'=>now()
            ]);
        }
    }
}
