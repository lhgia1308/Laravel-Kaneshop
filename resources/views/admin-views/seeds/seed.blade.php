<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Attributes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = DB::table('attributes')->where(['id' => 1])->first();
        if(!isset($data)) {
            DB::table('attributes')->insert([
                'id' => 1
                ,'name' => 'Size'
                ,'created_at' => now()
                ,'updated_at' => now()
            ]);
        }
    }
}
