<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('ID_USER');
            $table->string('NAMA_USER', 60);
            $table->string('USERNAME', 60);
            $table->string('PASSWORD', 60);
            $table->string('EMAIL', 200);
            $table->string('NO_HP', 30);
            $table->string('WA', 30);
            $table->string('PIN', 30);
            $table->unsignedBigInteger('ID_JENIS_USER');
            $table->foreign('ID_JENIS_USER')->references('id')->on('jenis_users');
            $table->string('STATUS_USER', 30);
            $table->string('DELETE_MARK', 1);
            $table->string('CREATE_BY', 30);
            $table->date('CREATE_DATE');
            $table->string('UPDATE_BY', 30)->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}