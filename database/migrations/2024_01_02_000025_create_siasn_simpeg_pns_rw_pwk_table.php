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
            $table->string('asalId', 42)->nullable()->index('25_asalId');
            $table->string('asalNama')->nullable();
            $table->string('instansi')->nullable()->index('25_instansi');
            $table->string('kpknBaru')->nullable();
            $table->string('lokasiKerjaBaru')->nullable();
            $table->string('pnsOrang')->nullable()->index('25_pnsOrang');
            $table->string('satuanKerja')->nullable();
            $table->string('skNomor')->nullable();
            $table->string('skTanggal')->nullable();
            $table->string('tmtPwk')->nullable();
            $table->string('unorBaru')->nullable();
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
