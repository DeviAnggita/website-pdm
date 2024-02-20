<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateErrorApplicationTable extends Migration
{
    public function up()
    {
        Schema::create('error_application', function (Blueprint $table) {
            $table->id('ERROR_ID');
            $table->string('ID_USER', 30);
            $table->foreign('ID_USER')->references('id')->on('users'); // Sesuaikan dengan nama tabel pengguna Anda
            $table->string('MODULES', 100);
            $table->string('CONTROLLER', 200);
            $table->string('FUNCTION', 200);
            $table->string('ERROR_LINE', 30);
            $table->string('ERROR_MESSAGE', 1000);
            $table->string('STATUS', 30);
            $table->string('PARAM', 300);
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
        Schema::dropIfExists('error_application');
    }
}