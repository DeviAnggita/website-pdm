<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Isi data sesuai kebutuhan
        DB::table('users')->insert([
            'ID_USER' => 'contoh_id_user',
            'NAMA_USER' => 'John Doe',
            'USERNAME' => 'johndoe',
            'PASSWORD' => bcrypt('password123'),
            'EMAIL' => 'john.doe@example.com',
            'NO_HP' => '123456789',
            'WA' => '987654321',
            'PIN' => '1234',
            'ID_JENIS_USER' => 1, // ID jenis user sesuai relasi
            'STATUS_USER' => 'Aktif',
            'DELETE_MARK' => 'N',
            'CREATE_BY' => 'admin',
            'CREATE_DATE' => now(),
            'UPDATE_BY' => null,
            'UPDATE_DATE' => null,
        ]);
    }
}