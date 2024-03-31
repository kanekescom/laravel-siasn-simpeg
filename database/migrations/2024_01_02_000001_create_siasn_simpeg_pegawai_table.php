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
        Schema::create('siasn_simpeg_pegawai', function (Blueprint $table) {
            $table->string('pns_id', 42)->primary();
            $table->string('nip_baru', 18)->nullable()->index('1_nip_baru');
            $table->string('nip_lama', 9)->nullable()->index('1_nip_lama');
            $table->string('nama')->nullable();
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->string('tempat_lahir_id')->nullable()->index('1_tempat_lahir_id');
            $table->string('tempat_lahir_nama')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->date('tanggal_lahir_')->nullable();
            $table->string('jenis_kelamin')->nullable()->index('1_jenis_kelamin');
            $table->unsignedTinyInteger('agama_id')->nullable()->index('1_agama_id')->autoIncrement(false);
            $table->string('agama_nama')->nullable();
            $table->unsignedTinyInteger('jenis_kawin_id')->nullable()->index('1_jenis_kawin_id')->autoIncrement(false);
            $table->string('jenis_kawin_nama')->nullable();
            $table->string('nik')->nullable()->index('1_nik');
            $table->string('nomor_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('email_gov')->nullable();
            $table->string('alamat')->nullable();
            $table->string('npwp_nomor')->nullable()->index('1_npwp_nomor');
            $table->string('bpjs')->nullable()->index('1_bpjs');
            $table->string('jenis_pegawai_id', 2)->nullable()->index('1_jenis_pegawai_id');
            $table->string('jenis_pegawai_nama')->nullable();
            $table->string('kedudukan_hukum_id', 2)->nullable()->index('1_kedudukan_hukum_id');
            $table->string('kedudukan_hukum_nama')->nullable();
            $table->string('status_cpns_pns')->nullable()->index('1_status_cpns_pns');
            $table->string('kartu_asn_virtual')->nullable()->index('1_kartu_asn_virtual');
            $table->string('nomor_sk_cpns')->nullable();
            $table->string('tanggal_sk_cpns')->nullable();
            $table->date('tanggal_sk_cpns_')->nullable();
            $table->string('tmt_cpns')->nullable();
            $table->date('tmt_cpns_')->nullable();
            $table->string('nomor_sk_pns')->nullable();
            $table->date('nomor_sk_pns_')->nullable();
            $table->string('tanggal_sk_pns')->nullable();
            $table->date('tanggal_sk_pns_')->nullable();
            $table->string('tmt_pns')->nullable();
            $table->date('tmt_pns_')->nullable();
            $table->unsignedTinyInteger('gol_awal_id')->nullable()->index('1_gol_awal_id')->autoIncrement(false);
            $table->string('gol_awal_nama')->nullable();
            $table->unsignedTinyInteger('gol_akhir_id')->nullable()->index('1_gol_akhir_id')->autoIncrement(false);
            $table->string('gol_akhir_nama')->nullable();
            $table->string('tmt_golongan')->nullable();
            $table->date('tmt_golongan_')->nullable();
            $table->unsignedTinyInteger('mk_tahun')->nullable()->autoIncrement(false);
            $table->unsignedTinyInteger('mk_bulan')->nullable()->autoIncrement(false);
            $table->unsignedTinyInteger('jenis_jabatan_id')->nullable()->index('1_jenis_jabatan_id')->autoIncrement(false);
            $table->string('jenis_jabatan_nama')->nullable();
            $table->string('jabatan_id', 42)->nullable()->index('1_jabatan_id');
            $table->string('jabatan_nama')->nullable();
            $table->string('tmt_jabatan')->nullable();
            $table->date('tmt_jabatan_')->nullable();
            $table->string('tingkat_pendidikan_id', 2)->nullable()->index('1_tingkat_pendidikan_id');
            $table->string('tingkat_pendidikan_nama')->nullable();
            $table->string('pendidikan_id', 42)->nullable()->index('1_pendidikan_id');
            $table->string('pendidikan_nama')->nullable();
            $table->string('tahun_lulus', 4)->nullable()->index('1_tahun_lulus');
            $table->string('kpkn_id', 42)->nullable()->index('1_kpkn_id');
            $table->string('kpkn_nama')->nullable();
            $table->string('lokasi_kerja_id', 42)->nullable()->index('1_lokasi_kerja_id');
            $table->string('lokasi_kerja_nama')->nullable();
            $table->string('unor_id', 42)->nullable()->index('1_unor_id');
            $table->string('unor_nama')->nullable();
            $table->string('instansi_induk_id', 42)->nullable()->index('1_instansi_induk_id');
            $table->string('instansi_induk_nama')->nullable();
            $table->string('instansi_kerja_id', 42)->nullable()->index('1_instansi_kerja_id');
            $table->string('instansi_kerja_nama')->nullable();
            $table->string('satuan_kerja_induk_id', 42)->nullable()->index('1_satuan_kerja_induk_id');
            $table->string('satuan_kerja_induk_nama')->nullable();
            $table->string('satuan_kerja_kerja_id', 42)->nullable()->index('1_satuan_kerja_kerja_id');
            $table->string('satuan_kerja_kerja_nama')->nullable();
            $table->boolean('is_valid_nik', 1)->nullable()->index('is_valid_nik');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_pegawai');
    }
};
