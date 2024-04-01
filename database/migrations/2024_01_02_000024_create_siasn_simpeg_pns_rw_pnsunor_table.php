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
        Schema::create('siasn_simpeg_pns_rw_pnsunor', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('unorBaru', 42)->nullable()->index('24_unorBaru');
            $table->string('pnsOrang', 42)->nullable()->index('24_pnsOrang');
            $table->string('skNomor')->nullable();
            $table->string('skTanggal')->nullable();
            $table->date('skTanggal_')->nullable();
            $table->string('namaUnorBaru')->nullable();
            $table->string('asalId', 42)->nullable()->index('24_asalId');
            $table->string('asalNama')->nullable();
            $table->string('instansi', 42)->nullable()->index('24_instansi');
            $table->string('asalNamaLabel')->nullable()->index('24_asalNamaLabel');
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
        Schema::dropIfExists('siasn_simpeg_pns_rw_pnsunor');
    }
};
