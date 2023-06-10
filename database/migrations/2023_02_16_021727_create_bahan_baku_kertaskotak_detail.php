<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahan_baku_kertaskotak_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bahan_baku')->constrained('produksi_bahan_baku')->onDelete('cascade');
            $table->integer('jml_adl');
            $table->integer('jml_sd');
            $table->integer('jml_sl');
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
        Schema::dropIfExists('bahan_baku_kertaskotak_detail');
    }
};
