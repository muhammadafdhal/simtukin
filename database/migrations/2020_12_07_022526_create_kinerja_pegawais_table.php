<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKinerjaPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kinerja_pegawais', function (Blueprint $table) {
            $table->id('kinerja_id');
            $table->enum('kinerja_status',['belum','selesai']);
            $table->string('kinerja_bulan');
            $table->string('kinerja_tahun');
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
        Schema::dropIfExists('kinerja_pegawais');
    }
}
