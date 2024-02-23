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
        Schema::create('siasn_simpeg_pengadaan_list_pengadaan_instansi', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('orang_id')->nullable()->index('2_orang_id');
            $table->string('no_peserta')->nullable()->index('2_no_peserta');
            $table->string('nip')->nullable()->index('2_nip');
            $table->string('nama')->nullable();
            $table->string('periode')->nullable()->index('2_periode');
            $table->string('instansi_id')->nullable()->index('2_instansi_id');
            $table->string('no_pertek')->nullable();
            $table->string('no_sk')->nullable();
            $table->string('path_ttd_sk')->nullable();
            $table->string('path_ttd_pertek')->nullable();
            $table->string('tgl_pertek')->nullable();
            $table->string('tgl_sk')->nullable();
            $table->string('tgl_kontrak_mulai')->nullable();
            $table->string('tgl_kontrak_akhir')->nullable();
            $table->string('jenis_formasi_id')->nullable()->index('2_jenis_formasi_id');
            $table->string('jenis_formasi_nama')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_pengadaan_list_pengadaan_instansi');
    }
};
