<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siasn_simpeg_pns_rw_cltn', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('cltnId', 42)->nullable()->index('11_cltnId');
            $table->string('nomorLetterBkn')->nullable();
            $table->string('pnsOrangId', 42)->nullable()->index('11_pnsOrangId');
            $table->string('skNomor')->nullable();
            $table->string('skTanggal')->nullable();
            $table->string('tanggalAkhir')->nullable();
            $table->string('tanggalAktif')->nullable();
            $table->string('tanggalAwal')->nullable();
            $table->string('tanggalLetterBkn')->nullable();
            $table->json('path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_pns_rw_cltn');
    }
};
