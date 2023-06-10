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
        Schema::create('produksi_overhead', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_produksi')->constrained('produksi')->onDelete('cascade');
            $table->foreignId('id_deskripsi')->constrained('deskripsi')->onDelete('cascade');
            $table->integer('biaya');
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
        Schema::dropIfExists('produksi_overhead');
    }
};
