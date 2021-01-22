<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeterlambatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterlambatans', function (Blueprint $table) {
            $table->id('terlambat_id');
            $table->foreignId('terlambat_detail_id');
            $table->string('terlambat_waktu');
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
        Schema::dropIfExists('keterlambatans');
    }
}
