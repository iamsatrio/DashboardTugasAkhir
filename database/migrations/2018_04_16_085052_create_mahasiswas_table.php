<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('STUDENTID');
            $table->string('FULLNAME');
            $table->string('CLASS');
            $table->string('STUDYPROGRAMNAME');
            $table->string('FACULTYNAME');
            $table->string('STUDENTSCHOOLYEAR');
            $table->string('STUDENTTYPENAME');
            $table->string('SELECTIONPATHNAME')->nullable();
            $table->integer('TAK_POINT');
            $table->string('PEKERJAANAYAH');
            $table->integer('PENGHASILANAYAH')->nullable();
            $table->string('PEKERJAANIBU');
            $table->integer('PENGHASILANIBU')->nullable();
            $table->string('SENIORHIGHSCHOOL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}
