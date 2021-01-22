<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKinerjaPegawaiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kinerja_pegawai_details', function (Blueprint $table) {
            $table->id('detail_id');
            $table->foreignId('detail_user_id');
            $table->foreignId('detail_kinerja_id');
            $table->string('detail_hukuman_disiplin');
            $table->integer('detail_izin');
            $table->integer('detail_sakt_dgn_surat');
            $table->integer('detail_sakit_tanpa_surat');
            $table->integer('detail_cuti_bersalin');
            $table->string('tanpa_keterangan');
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
        Schema::dropIfExists('kinerja_pegawai_details');
    }
}
