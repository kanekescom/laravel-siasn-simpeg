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
        Schema::create('siasn_simpeg_pns_rw_diklat', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('idPns', 42)->nullable()->index('12_idPns');
            $table->string('institusiPenyelenggara')->nullable();
            $table->string('latihanStrukturalId', 42)->nullable()->index('12_latihanStrukturalId');
            $table->string('latihanStrukturalNama')->nullable();
            $table->string('nipBaru', 18)->nullable();
            $table->string('nipLama', 9)->nullable();
            $table->string('nomor')->nullable();
            $table->string('tahun')->nullable()->index('12_tahun');
            $table->string('tanggal')->nullable();
            $table->string('tanggalSelesai')->nullable();
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
        Schema::dropIfExists('siasn_simpeg_pns_rw_diklat');
    }
};
