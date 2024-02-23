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
        Schema::create('siasn_simpeg_pns_rw_kursus', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('idPns', 42)->nullable()->index('18_idPns');
            $table->string('nipBaru', 18)->nullable();
            $table->string('nipLama', 9)->nullable();
            $table->string('jenisKursusNama')->nullable();
            $table->string('jenisKursusSertifikat')->nullable();
            $table->string('institusiPenyelenggara')->nullable();
            $table->string('jenisKursusId', 42)->nullable()->index('18_jenisKursusId');
            $table->string('jumlahJam')->nullable();
            $table->string('namaKursus')->nullable();
            $table->string('noSertipikat')->nullable();
            $table->string('tahunKursus')->nullable()->index('18_tahunKursus');
            $table->string('tanggalKursus')->nullable();
            $table->json('path')->nullable();
            $table->string('jenisDiklatId', 42)->nullable()->index('18_jenisDiklatId');
            $table->string('tanggalSelesaiKursus')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_pns_rw_kursus');
    }
};
