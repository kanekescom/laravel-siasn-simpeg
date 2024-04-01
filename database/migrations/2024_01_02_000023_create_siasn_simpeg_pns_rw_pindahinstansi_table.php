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
            $table->string('instansiKerjaLama', 42)->nullable()->index('23_instansiKerjaLama');
            $table->string('jenisPegawai', 2)->nullable()->index('23_jenisPegawai');
            $table->string('satuanKerjaBaru', 42)->nullable()->index('23_satuanKerjaBaru');
            $table->string('satuanKerjaIndukBaru', 42)->nullable()->index('23_satuanKerjaIndukBaru');
            $table->string('satuanKerjaIndukLama', 42)->nullable()->index('23_satuanKerjaIndukLama');
            $table->unsignedTinyInteger('jenisJabatanLama')->nullable()->autoIncrement(false)->index('23_jenisJabatanLama');
            $table->string('lokasiKerjaBaru', 42)->nullable()->index('23_lokasiKerjaBaru');
            $table->string('lokasiKerjaLama', 42)->nullable()->index('23_lokasiKerjaLama');
            $table->string('kpknBaru', 42)->nullable()->index('23_kpknBaru');
            $table->unsignedTinyInteger('jenisJabatanBaru')->nullable()->autoIncrement(false)->index('23_jenisJabatanBaru');
            $table->string('eselon', 2)->nullable()->index('23_eselon');
            $table->string('jabatanFungsionalLama', 42)->nullable()->index('23_jabatanFungsionalLama');
            $table->string('instansiKerjaBaru', 42)->nullable()->index('23_instansiKerjaBaru');
            $table->string('unorLama', 42)->nullable()->index('23_unorLama');
            $table->string('instansiIndukBaru', 42)->nullable()->index('23_instansiIndukBaru');
            $table->string('unorBaru', 42)->nullable()->index('23_unorBaru');
            $table->string('instansiIndukLama', 42)->nullable()->index('23_instansiIndukLama');
            $table->string('jabatanFungsionalBaru', 42)->nullable()->index('23_jabatanFungsionalBaru');
            $table->string('pnsOrang', 42)->nullable()->index('23_pnsOrang');
            $table->string('skUsulNomor')->nullable();
            $table->string('skUsulTanggal')->nullable();
            $table->date('skUsulTanggal_')->nullable();
            $table->string('skBknNomor')->nullable();
            $table->string('skBknTanggal')->nullable();
            $table->date('skBknTanggal_')->nullable();
            $table->string('tmtPi')->nullable();
            $table->date('tmtPi_')->nullable();
            $table->string('skAsalNomor')->nullable();
            $table->string('skAsalTanggal')->nullable();
            $table->date('skAsalTanggal_')->nullable();
            $table->string('skTujuanNomor')->nullable();
            $table->string('skTujuanTanggal')->nullable();
            $table->date('skTujuanTanggal_')->nullable();
            $table->string('satuanKerjaLama', 42)->nullable()->index('23_satuanKerjaLama');
            $table->string('jenisPi')->nullable();
            $table->string('jabatanFungsionalUmumBaru')->nullable();
            $table->string('orangUsulPeremajaanId', 42)->nullable()->index('23_orangUsulPeremajaanId');
            $table->string('skAsalProvNomor')->nullable();
            $table->string('skAsalProvTanggal')->nullable();
            $table->date('skAsalProvTanggal_')->nullable();
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
