<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserActivitySeeder extends Seeder
{
    public function run()
    {
        DB::table('user_activity')->insert([
            // Tambahkan data seeder sesuai kebutuhan
            'ID_USER' => 'user123',
            'DISCRIPSI' => 'Aktivitas pengguna pertama',
            'STATUS' => 'Aktif',
            'MENU_ID' => '001',
            'DELETE_MARK' => 'N',
            'CREATE_BY' => 'admin',
        ]);
    }
}