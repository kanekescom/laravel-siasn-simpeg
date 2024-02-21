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
        Schema::create('siasn_simpeg_pns_rw_angkakredit', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('pns')->nullable()->index('10_pns');
            $table->string('nomorSk')->nullable();
            $table->string('tanggalSk')->nullable();
            $table->string('bulanMulaiPenailan')->nullable();
            $table->string('tahunMulaiPenailan')->nullable();
            $table->string('bulanSelesaiPenailan')->nullable();
            $table->string('tahunSelesaiPenailan')->nullable();
            $table->string('kreditUtamaBaru')->nullable();
            $table->string('kreditPenunjangBaru')->nullable();
            $table->string('kreditBaruTotal')->nullable();
            $table->string('rwJabatan')->nullable();
            $table->string('namaJabatan')->nullable();
            $table->string('isAngkaKreditPertama')->nullable()->index('10_isAngkaKreditPertama');
            $table->string('isIntegrasi')->nullable()->index('10_isIntegrasi');
            $table->string('isKonversi')->nullable()->index('10_isKonversi');
            $table->json('path')->nullable();
            $table->string('Sumber')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_pns_rw_angkakredit');
    }
};
