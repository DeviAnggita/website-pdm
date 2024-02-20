<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('jenis_user')->insert([
            // Tambahkan data seeder sesuai kebutuhan
            'NAME_JENIS_USER' => 'Admin',
        ]);
    }
}