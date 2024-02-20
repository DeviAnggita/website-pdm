<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ErrorApplicationSeeder extends Seeder
{
    public function run()
    {
        // Ganti 'users' dengan nama tabel pengguna Anda
        $users = DB::table('users')->pluck('id');

        foreach (range(1, 10) as $index) {
            DB::table('error_application')->insert([
                'ID_USER' => $users->random(),
                'MODULES' => Str::random(100),
                'CONTROLLER' => Str::random(200),
                'FUNCTION' => Str::random(200),
                'ERROR_LINE' => Str::random(30),
                'ERROR_MESSAGE' => Str::random(1000),
                'STATUS' => Str::random(30),
                'PARAM' => Str::random(300),
                'CREATE_DATE' => now()->toDateString(),
                'CREATE_TIME' => now(),
                'DELETE_MARK' => '0',
                'UPDATE_BY' => Str::random(30),
                'UPDATE_DATE' => now(),
            ]);
        }
    }
}