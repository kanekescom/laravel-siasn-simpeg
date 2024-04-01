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
        Schema::create('siasn_simpeg_pns_rw_masakerja', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('idPns', 42)->nullable()->index('19_idPns');
            $table->string('nipBaru', 18)->nullable()->index('19_nipBaru');
            $table->string('nipLama', 9)->nullable()->index('19_nipLama');
            $table->string('pengalaman')->nullable();
            $table->string('tanggalAwal')->nullable();
            $table->date('tanggalAwal_')->nullable();
            $table->string('tanggalSelesai')->nullable();
            $table->date('tanggalSelesai_')->nullable();
            $table->string('nomorSk')->nullable();
            $table->string('tanggalSk')->nullable();
            $table->date('tanggalSk_')->nullable();
            $table->string('nomorBkn')->nullable();
            $table->string('tanggalBkn')->nullable();
            $table->date('tanggalBkn_')->nullable();
            $table->unsignedTinyInteger('tasaKerjaTahun')->nullable()->autoIncrement(false);
            $table->unsignedTinyInteger('masaKerjaBulan')->nullable()->autoIncrement(false);
            $table->boolean('dinilai')->nullable();
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
        Schema::dropIfExists('siasn_simpeg_pns_rw_masakerja');
    }
};
