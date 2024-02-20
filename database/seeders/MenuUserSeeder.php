<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MenuUserSeeder extends Seeder
{
    public function run()
    {
        // Ganti 'users' dengan nama tabel pengguna Anda
        $users = DB::table('users')->pluck('id');
        // Ganti 'menus' dengan nama tabel menu Anda
        $menus = DB::table('menus')->pluck('id');

        foreach (range(1, 10) as $index) {
            DB::table('menu_user')->insert([
                'ID_USER' => $users->random(),
                'MENU_ID' => $menus->random(),
                'CREATE_DATE' => now()->toDateString(),
                'CREATE_TIME' => now(),
                'DELETE_MARK' => '0',
                'UPDATE_BY' => Str::random(30),
                'UPDATE_DATE' => now(),
            ]);
        }
    }
}