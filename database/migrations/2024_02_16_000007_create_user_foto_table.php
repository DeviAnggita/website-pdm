<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFotoTable extends Migration
{
    public function up()
    {
        Schema::create('user_foto', function (Blueprint $table) {
            $table->id('NO_FOTO');
            $table->string('ID_USER', 30);
            $table->string('FOTO', 200);
            $table->string('CREATE_BY', 30);
            $table->date('CREATE_DATE');
            $table->string('DELETE_MARK', 1);
            $table->string('UPDATE_BY', 30)->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();

            // Foreign Key
            $table->foreign('ID_USER')->references('id')->on('users'); // Sesuaikan 'users' dengan tabel pengguna Anda.
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_foto');
    }
}