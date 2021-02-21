<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('products')->insert([
            'name' => 'ยาสีฟัน',
            'description' => 'ยาสีฟันตรา คอลเกต',
            'price' => 20,
            'qty' => 10,
            'exp' => '2021-02-21'
        ]);
        
        DB::table('products')->insert([
            'name' => 'น้ำดื่ม',
            'description' => 'น้ำดื่มตรา อาชา',
            'price' => 7,
            'qty' => 20,
            'exp' => '2021-02-21'
        ]);
        
        DB::table('products')->insert([
            'name' => 'สบู่',
            'description' => 'สบู่ ตราดอกไม้',
            'price' => 5,
            'qty' => 12,
            'exp' => '2021-02-21'
        ]);

    }
}
