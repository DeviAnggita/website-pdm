<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserFotoSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_foto')->insert([
            // Tambahkan data seeder sesuai kebutuhan
            'ID_USER' => 'user123',
            'FOTO' => 'path/to/photo.jpg',
            'CREATE_BY' => 'admin',
            'CREATE_DATE' => now()->toDateString(),
            'DELETE_MARK' => 'N',
            'UPDATE_BY' => null,
            'UPDATE_DATE' => null,
        ]);
    }
}