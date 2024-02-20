<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        DB::table('menu')->insert([
            // Tambahkan data seeder sesuai kebutuhan
            'MENU_ID' => '001',
            'ID_LEVEL' => '001',
            'MENU_NAME' => 'Dashboard',
            'MENU_LINK' => '/dashboard',
            'MENU_ICON' => 'dashboard-icon',
            'PARENT_ID' => null,
            'CREATE_BY' => 'admin',
            'CREATE_DATE' => now()->toDateString(),
            'DELETE_MARK' => 'N',
            'UPDATE_BY' => null,
            'UPDATE_DATE' => null,
        ]);
    }
}