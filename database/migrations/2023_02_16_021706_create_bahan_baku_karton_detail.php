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
        Schema::create('bahan_baku_karton_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bahan_baku')->constrained('produksi_bahan_baku');
            $table->integer('jml_at');
            $table->integer('jml_skl');
            $table->integer('jml_skd');
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
        Schema::dropIfExists('bahan_baku_karton_detail');
    }
};
