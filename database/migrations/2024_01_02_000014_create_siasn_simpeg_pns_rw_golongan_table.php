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
            $table->string('nipBaru', 18)->nullable()->index('14_nipBaru');
            $table->string('nipLama', 9)->nullable()->index('14_nipLama');
            $table->unsignedTinyInteger('golonganId')->nullable()->index('14_golonganId')->autoIncrement(false);
            $table->string('golongan')->nullable();
            $table->string('skNomor')->nullable();
            $table->string('skTanggal')->nullable();
            $table->date('skTanggal_')->nullable();
            $table->string('tmtGolongan')->nullable();
            $table->date('tmtGolongan_')->nullable();
            $table->string('noPertekBkn')->nullable();
            $table->string('tglPertekBkn')->nullable();
            $table->date('tglPertekBkn_')->nullable();
            $table->unsignedSmallInteger('jumlahKreditUtama')->nullable()->autoIncrement(false);
            $table->unsignedSmallInteger('jumlahKreditTambahan')->nullable()->autoIncrement(false);
            $table->unsignedSmallInteger('jenisKPId', 42)->nullable()->index('14_jenisKPId')->autoIncrement(false);
            $table->string('jenisKPNama')->nullable();
            $table->unsignedTinyInteger('masaKerjaGolonganTahun')->nullable()->autoIncrement(false);
            $table->unsignedTinyInteger('masaKerjaGolonganBulan')->nullable()->autoIncrement(false);
            $table->json('path')->nullable();
            $table->string('pangkat')->nullable();
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
