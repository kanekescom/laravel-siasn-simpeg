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
            $table->string('nipBaru', 18)->nullable()->index('18_nipBaru');
            $table->string('nipLama', 9)->nullable()->index('18_nipLama');
            $table->string('jenisKursusNama')->nullable();
            $table->string('jenisKursusSertifikat')->nullable();
            $table->string('institusiPenyelenggara')->nullable();
            $table->string('jenisKursusId', 42)->nullable()->index('18_jenisKursusId');
            $table->unsignedSmallInteger('jumlahJam')->nullable()->autoIncrement(false);
            $table->string('namaKursus')->nullable();
            $table->string('noSertipikat')->nullable();
            $table->string('tahunKursus', 4)->nullable()->index('18_tahunKursus');
            $table->string('tanggalKursus')->nullable();
            $table->date('tanggalKursus_')->nullable();
            $table->json('path')->nullable();
            $table->unsignedTinyInteger('jenisDiklatId')->nullable()->index('18_jenisDiklatId')->autoIncrement(false);
            $table->string('tanggalSelesaiKursus')->nullable();
            $table->date('tanggalSelesaiKursus_')->nullable();
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
