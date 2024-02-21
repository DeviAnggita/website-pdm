<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuUserTable extends Migration
{
    public function up()
    {
        Schema::create('menu_user', function (Blueprint $table) {
            $table->increments('NO_SETTING');
            $table->string('ID_USER', 30)->primary(); // Make sure ID_USER is set as the primary key
            // $table->string('ID_USER')
            $table->foreign('ID_USER')->references('id')->on('users'); // Sesuaikan dengan nama tabel pengguna Anda
            $table->string('MENU_ID', 3);
            $table->foreign('MENU_ID')->references('id')->on('menus'); // Sesuaikan dengan nama tabel menu Anda
            $table->date('CREATE_DATE');
            $table->timestamp('CREATE_TIME');
            $table->string('DELETE_MARK', 1);
            $table->string('UPDATE_BY', 30);
            $table->timestamp('UPDATE_DATE');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_user');
    }
}