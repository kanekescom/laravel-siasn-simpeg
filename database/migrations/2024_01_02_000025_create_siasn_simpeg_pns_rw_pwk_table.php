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
        Schema::create('siasn_simpeg_pns_rw_pwk', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('instansi', 42)->nullable()->index('25_instansi');
            $table->string('kpknBaru', 42)->nullable()->index('25_kpknBaru');
            $table->string('lokasiKerjaBaru', 42)->nullable()->index('25_lokasiKerjaBaru');
            $table->string('unorBaru', 42)->nullable()->index('25_unorBaru');
            $table->string('pnsOrang', 42)->nullable()->index('25_pnsOrang');
            $table->string('satuanKerja', 42)->nullable()->index('25_satuanKerja');
            $table->string('skNomor')->nullable();
            $table->string('skTanggal')->nullable();
            $table->date('skTanggal_')->nullable();
            $table->string('tmtPwk')->nullable();
            $table->date('tmtPwk_')->nullable();
            $table->string('asalNama')->nullable();
            $table->string('asalId', 42)->nullable()->index('25_asalId');
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
        Schema::dropIfExists('siasn_simpeg_pns_rw_pwk');
    }
};
