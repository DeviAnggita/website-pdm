<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisUserTable extends Migration
{
    public function up()
    {
        Schema::create('jenis_user', function (Blueprint $table) {
            $table->id('ID_JENIS_USER');
            $table->string('NAME_JENIS_USER', 300);
        });
    }

    public function down()
    {
        Schema::dropIfExists('jenis_user');
    }
}