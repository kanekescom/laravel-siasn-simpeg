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
            $table->string('pns', 42)->nullable()->index('10_pns');
            $table->string('nomorSk')->nullable();
            $table->string('tanggalSk')->nullable();
            $table->date('tanggalSk_')->nullable();
            $table->string('bulanMulaiPenailan', 2)->nullable();
            $table->string('tahunMulaiPenailan', 4)->nullable();
            $table->string('bulanSelesaiPenailan', 2)->nullable();
            $table->string('tahunSelesaiPenailan', 4)->nullable();
            $table->decimal('kreditUtamaBaru', 6, 3)->nullable();
            $table->decimal('kreditPenunjangBaru', 6, 3)->nullable();
            $table->decimal('kreditBaruTotal', 6, 3)->nullable();
            $table->string('rwJabatan')->nullable();
            $table->string('namaJabatan')->nullable();
            $table->boolean('isAngkaKreditPertama')->nullable()->index('10_isAngkaKreditPertama');
            $table->boolean('isIntegrasi')->nullable()->index('10_isIntegrasi');
            $table->boolean('isKonversi')->nullable()->index('10_isKonversi');
            $table->json('path')->nullable();
            $table->string('Sumber')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            // $table->timestamps();
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
