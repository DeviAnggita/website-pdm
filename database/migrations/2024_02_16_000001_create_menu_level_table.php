<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuLevelTable extends Migration
{
    public function up()
    {
        Schema::create('menu_level', function (Blueprint $table) {
            $table->string('ID_LEVEL', 3)->primary();
            $table->string('LEVEL', 60);
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_level');
    }
}