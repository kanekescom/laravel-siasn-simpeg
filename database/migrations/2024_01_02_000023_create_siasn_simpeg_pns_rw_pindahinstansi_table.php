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
        Schema::create('siasn_simpeg_pns_rw_pindahinstansi', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('eselon')->nullable();
            $table->string('instansiIndukBaru')->nullable();
            $table->string('instansiIndukLama')->nullable();
            $table->string('instansiKerjaBaru')->nullable();
            $table->string('instansiKerjaLama')->nullable();
            $table->string('jabatanFungsionalBaru')->nullable();
            $table->string('jabatanFungsionalLama')->nullable();
            $table->string('jabatanFungsionalUmumBaru')->nullable();
            $table->string('jenisJabatanBaru')->nullable();
            $table->string('jenisJabatanLama')->nullable();
            $table->string('jenisPegawai')->nullable();
            $table->string('jenisPi')->nullable();
            $table->string('kpknBaru')->nullable();
            $table->string('lokasiKerjaBaru')->nullable();
            $table->string('lokasiKerjaLama')->nullable();
            $table->string('orangUsulPeremajaanId', 42)->nullable()->index('23_orangUsulPeremajaanId');
            $table->string('pnsOrang')->nullable();
            $table->string('satuanKerjaBaru')->nullable();
            $table->string('satuanKerjaIndukBaru')->nullable();
            $table->string('satuanKerjaIndukLama')->nullable();
            $table->string('satuanKerjaLama')->nullable();
            $table->string('skAsalNomor')->nullable();
            $table->string('skAsalProvNomor')->nullable();
            $table->string('skAsalProvTanggal')->nullable();
            $table->string('skAsalTanggal')->nullable();
            $table->string('skBknNomor')->nullable();
            $table->string('skBknTanggal')->nullable();
            $table->string('skTujuanNomor')->nullable();
            $table->string('skTujuanTanggal')->nullable();
            $table->string('skUsulNomor')->nullable();
            $table->string('skUsulTanggal')->nullable();
            $table->string('tmtPi')->nullable();
            $table->string('unorBaru')->nullable();
            $table->string('unorLama')->nullable();
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
        Schema::dropIfExists('siasn_simpeg_pns_rw_pindahinstansi');
    }
};
