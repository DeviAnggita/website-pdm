<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserActivityTable extends Migration
{
    public function up()
    {
        Schema::create('user_activity', function (Blueprint $table) {
            $table->id('NO_ACTIVITY');
            $table->string('ID_USER', 30);
            $table->string('DISCRIPSI', 300);
            $table->string('STATUS', 30);
            $table->string('MENU_ID', 3);
            $table->string('DELETE_MARK', 1);
            $table->string('CREATE_BY', 30);
            $table->timestamp('CREATE_DATE')->useCurrent();
            
            // Foreign Keys
            $table->foreign('ID_USER')->references('ID_USER')->on('users'); // Ubah 'users' sesuai tabel pengguna Anda.
            $table->foreign('MENU_ID')->references('MENU_ID')->on('menus'); // Ubah 'menus' sesuai tabel menu Anda.
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_activity');
    }
}