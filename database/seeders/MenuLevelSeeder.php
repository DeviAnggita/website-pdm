<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuLevelSeeder extends Seeder
{
    public function run()
    {
        DB::table('menu_level')->insert([
            // Tambahkan data seeder sesuai kebutuhan
            'ID_LEVEL' => '001',
            'LEVEL' => 'Admin',
        ]);
    }
}