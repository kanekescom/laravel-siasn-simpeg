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
            $table->string('nip_baru')->nullable()->index('1_nip_baru');
            $table->string('nip_lama')->nullable()->index('1_nip_lama');
            $table->string('nama')->nullable();
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->string('tempat_lahir_id')->nullable()->index('1_tempat_lahir_id');
            $table->string('tempat_lahir_nama')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable()->index('1_jenis_kelamin');
            $table->string('agama_id')->nullable()->index('1_agama_id');
            $table->string('agama_nama')->nullable();
            $table->string('jenis_kawin_id')->nullable()->index('1_jenis_kawin_id');
            $table->string('jenis_kawin_nama')->nullable();
            $table->string('nik')->nullable()->index('1_nik');
            $table->string('nomor_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('email_gov')->nullable();
            $table->string('alamat')->nullable();
            $table->string('npwp_nomor')->nullable()->index('1_npwp_nomor');
            $table->string('bpjs')->nullable()->index('1_bpjs');
            $table->string('jenis_pegawai_id')->nullable()->index('1_jenis_pegawai_id');
            $table->string('jenis_pegawai_nama')->nullable();
            $table->string('kedudukan_hukum_id')->nullable()->index('1_kedudukan_hukum_id');
            $table->string('kedudukan_hukum_nama')->nullable();
            $table->string('status_cpns_pns')->nullable()->index('1_status_cpns_pns');
            $table->string('kartu_asn_virtual')->nullable()->index('1_kartu_asn_virtual');
            $table->string('nomor_sk_cpns')->nullable();
            $table->string('tanggal_sk_cpns')->nullable();
            $table->string('tmt_cpns')->nullable();
            $table->string('nomor_sk_pns')->nullable();
            $table->string('tanggal_sk_pns')->nullable();
            $table->string('tmt_pns')->nullable();
            $table->string('gol_awal_id')->nullable()->index('1_gol_awal_id');
            $table->string('gol_awal_nama')->nullable();
            $table->string('gol_akhir_id')->nullable()->index('1_gol_akhir_id');
            $table->string('gol_akhir_nama')->nullable();
            $table->string('tmt_golongan')->nullable();
            $table->string('mk_tahun')->nullable();
            $table->string('mk_bulan')->nullable();
            $table->string('jenis_jabatan_id')->nullable()->index('1_jenis_jabatan_id');
            $table->string('jenis_jabatan_nama')->nullable();
            $table->string('jabatan_id')->nullable()->index('1_jabatan_id');
            $table->string('jabatan_nama')->nullable();
            $table->string('tmt_jabatan')->nullable();
            $table->string('tingkat_pendidikan_id')->nullable()->index('1_tingkat_pendidikan_id');
            $table->string('tingkat_pendidikan_nama')->nullable();
            $table->string('pendidikan_id')->nullable()->index('1_pendidikan_id');
            $table->string('pendidikan_nama')->nullable();
            $table->string('tahun_lulus')->nullable()->index('1_tahun_lulus');
            $table->string('kpkn_id')->nullable()->index('1_kpkn_id');
            $table->string('kpkn_nama')->nullable();
            $table->string('lokasi_kerja_id')->nullable()->index('1_lokasi_kerja_id');
            $table->text('lokasi_kerja_nama')->nullable();
            $table->string('unor_id')->nullable()->index('1_unor_id');
            $table->text('unor_nama')->nullable();
            $table->string('instansi_induk_id')->nullable()->index('1_instansi_induk_id');
            $table->text('instansi_induk_nama')->nullable();
            $table->string('instansi_kerja_id')->nullable()->index('1_instansi_kerja_id');
            $table->text('instansi_kerja_nama')->nullable();
            $table->string('satuan_kerja_induk_id')->nullable()->index('1_satuan_kerja_induk_id');
            $table->text('satuan_kerja_induk_nama')->nullable();
            $table->string('satuan_kerja_kerja_id')->nullable()->index('1_satuan_kerja_kerja_id');
            $table->text('satuan_kerja_kerja_nama')->nullable();
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
