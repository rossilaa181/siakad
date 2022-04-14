<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiKelasMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Add Relation Table
        Schema::table('mahasiswa', function(Blueprint $table){
            $table->dropColumn('kelas'); //menghapus kolom kelas
            $table->unsignedBigInteger('kelas_id')->nullable(); //menambahkan kolom kelas_id
            $table->foreign('kelas_id')->references('id')->on('kelas'); //memambahkan foreign key di kolom kelas_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         //drop table kelas
         Schema::table('mahasiswa', function (Blueprint $table) {
            $table->string('kelas');
            $table->dropForeign(['kelas_id']);
        });
    }
}
