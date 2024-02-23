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
        Schema::create('siasn_simpeg_pns_rw_golongan', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('idPns', 42)->nullable()->index('14_idPns');
            $table->string('nipBaru', 18)->nullable();
            $table->string('nipLama', 9)->nullable();
            $table->string('golonganId', 42)->nullable()->index('14_golonganId');
            $table->string('golongan')->nullable();
            $table->string('skNomor')->nullable();
            $table->string('skTanggal')->nullable();
            $table->string('tmtGolongan')->nullable();
            $table->string('noPertekBkn')->nullable();
            $table->string('tglPertekBkn')->nullable();
            $table->string('jumlahKreditUtama')->nullable();
            $table->string('jumlahKreditTambahan')->nullable();
            $table->string('jenisKPId', 42)->nullable()->index('14_jenisKPId');
            $table->string('jenisKPNama')->nullable();
            $table->string('masaKerjaGolonganTahun')->nullable();
            $table->string('masaKerjaGolonganBulan')->nullable();
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
        Schema::dropIfExists('siasn_simpeg_pns_rw_golongan');
    }
};
