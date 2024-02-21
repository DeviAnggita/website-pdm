<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->string('MENU_ID', 3)->primary();
            $table->string('ID_LEVEL', 3);
            $table->string('MENU_NAME', 300);
            $table->string('MENU_LINK', 300);
            $table->string('MENU_ICON', 300);
            $table->string('PARENT_ID', 30)->nullable();
            $table->string('CREATE_BY', 30);
            $table->date('CREATE_DATE');
            $table->string('DELETE_MARK', 1);
            $table->string('UPDATE_BY', 30)->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();
            
            // Foreign Key
            $table->foreign('ID_LEVEL')->references('ID_LEVEL')->on('user_levels');
            $table->foreign('PARENT_ID')->references('MENU_ID')->on('menu');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu');
    }
}