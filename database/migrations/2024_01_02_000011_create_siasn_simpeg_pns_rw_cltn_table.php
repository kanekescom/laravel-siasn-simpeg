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
            $table->string('cltnId', 2)->nullable()->index('11_cltnId');
            $table->string('skNomor')->nullable();
            $table->string('skTanggal')->nullable();
            $table->date('skTanggal_')->nullable();
            $table->string('tanggalAwal')->nullable();
            $table->date('tanggalAwal_')->nullable();
            $table->string('tanggalAkhir')->nullable();
            $table->date('tanggalAkhir_')->nullable();
            $table->string('tanggalAktif')->nullable();
            $table->date('tanggalAktif_')->nullable();
            $table->string('nomorLetterBkn')->nullable();
            $table->string('tanggalLetterBkn')->nullable();
            $table->dateTime('tanggalLetterBkn_')->nullable();
            $table->string('pnsOrangId', 42)->nullable()->index('11_pnsOrangId');
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
