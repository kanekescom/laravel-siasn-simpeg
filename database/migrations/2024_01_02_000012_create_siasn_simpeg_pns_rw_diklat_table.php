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
            $table->string('nipBaru', 18)->nullable()->index('12_nipBaru');
            $table->string('nipLama', 9)->nullable()->index('12_nipLama');
            $table->unsignedTinyInteger('latihanStrukturalId')->nullable()->index('12_latihanStrukturalId')->autoIncrement(false);
            $table->string('latihanStrukturalNama')->nullable();
            $table->string('nomor')->nullable();
            $table->string('tanggal')->nullable();
            $table->date('tanggal_')->nullable();
            $table->string('tahun', 4)->nullable()->index('12_tahun');
            $table->json('path')->nullable();
            $table->unsignedSmallInteger('jumlahJam')->nullable();
            $table->string('tanggalSelesai')->nullable();
            $table->date('tanggalSelesai_')->nullable();
            $table->string('institusiPenyelenggara')->nullable();
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
