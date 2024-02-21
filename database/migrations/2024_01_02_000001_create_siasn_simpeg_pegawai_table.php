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
            $table->string('PNS_ID', 42)->primary();
            $table->string('NIP_BARU')->nullable()->index('1_NIP_BARU');
            $table->string('NIP_LAMA')->nullable()->index('1_NIP_LAMA');
            $table->string('NAMA')->nullable();
            $table->string('GELAR_DEPAN')->nullable();
            $table->string('GELAR_BELAKANG')->nullable();
            $table->string('TEMPAT_LAHIR_ID')->nullable()->index('1_TEMPAT_LAHIR_ID');
            $table->string('TEMPAT_LAHIR_NAMA')->nullable();
            $table->string('TANGGAL_LAHIR')->nullable();
            $table->string('JENIS_KELAMIN')->nullable()->index('1_JENIS_KELAMIN');
            $table->string('AGAMA_ID')->nullable()->index('1_AGAMA_ID');
            $table->string('AGAMA_NAMA')->nullable();
            $table->string('JENIS_KAWIN_ID')->nullable()->index('1_JENIS_KAWIN_ID');
            $table->string('JENIS_KAWIN_NAMA')->nullable();
            $table->string('NIK')->nullable()->index('1_NIK');
            $table->string('NOMOR_HP')->nullable();
            $table->string('EMAIL')->nullable();
            $table->string('EMAIL_GOV')->nullable();
            $table->string('ALAMAT')->nullable();
            $table->string('NPWP_NOMOR')->nullable()->index('1_NPWP_NOMOR');
            $table->string('BPJS')->nullable()->index('1_BPJS');
            $table->string('JENIS_PEGAWAI_ID')->nullable()->index('1_JENIS_PEGAWAI_ID');
            $table->string('JENIS_PEGAWAI_NAMA')->nullable();
            $table->string('KEDUDUKAN_HUKUM_ID')->nullable()->index('1_KEDUDUKAN_HUKUM_ID');
            $table->string('KEDUDUKAN_HUKUM_NAMA')->nullable();
            $table->string('STATUS_CPNS_PNS')->nullable()->index('1_STATUS_CPNS_PNS');
            $table->string('KARTU_ASN_VIRTUAL')->nullable()->index('1_KARTU_ASN_VIRTUAL');
            $table->string('NOMOR_SK_CPNS')->nullable();
            $table->string('TANGGAL_SK_CPNS')->nullable();
            $table->string('TMT_CPNS')->nullable();
            $table->string('NOMOR_SK_PNS')->nullable();
            $table->string('TANGGAL_SK_PNS')->nullable();
            $table->string('TMT_PNS')->nullable();
            $table->string('GOL_AWAL_ID')->nullable()->index('1_GOL_AWAL_ID');
            $table->string('GOL_AWAL_NAMA')->nullable();
            $table->string('GOL_AKHIR_ID')->nullable()->index('1_GOL_AKHIR_ID');
            $table->string('GOL_AKHIR_NAMA')->nullable();
            $table->string('TMT_GOLONGAN')->nullable();
            $table->string('MK_TAHUN')->nullable();
            $table->string('MK_BULAN')->nullable();
            $table->string('JENIS_JABATAN_ID')->nullable()->index('1_JENIS_JABATAN_ID');
            $table->string('JENIS_JABATAN_NAMA')->nullable();
            $table->string('JABATAN_ID')->nullable()->index('1_JABATAN_ID');
            $table->string('JABATAN_NAMA')->nullable();
            $table->string('TMT_JABATAN')->nullable();
            $table->string('TINGKAT_PENDIDIKAN_ID')->nullable()->index('1_TINGKAT_PENDIDIKAN_ID');
            $table->string('TINGKAT_PENDIDIKAN_NAMA')->nullable();
            $table->string('PENDIDIKAN_ID')->nullable()->index('1_PENDIDIKAN_ID');
            $table->string('PENDIDIKAN_NAMA')->nullable();
            $table->string('TAHUN_LULUS')->nullable()->index('1_TAHUN_LULUS');
            $table->string('KPKN_ID')->nullable()->index('1_KPKN_ID');
            $table->string('KPKN_NAMA')->nullable();
            $table->string('LOKASI_KERJA_ID')->nullable()->index('1_LOKASI_KERJA_ID');
            $table->text('LOKASI_KERJA_NAMA')->nullable();
            $table->string('UNOR_ID')->nullable()->index('1_UNOR_ID');
            $table->text('UNOR_NAMA')->nullable();
            $table->string('INSTANSI_INDUK_ID')->nullable()->index('1_INSTANSI_INDUK_ID');
            $table->text('INSTANSI_INDUK_NAMA')->nullable();
            $table->string('INSTANSI_KERJA_ID')->nullable()->index('1_INSTANSI_KERJA_ID');
            $table->text('INSTANSI_KERJA_NAMA')->nullable();
            $table->string('SATUAN_KERJA_INDUK_ID')->nullable()->index('1_SATUAN_KERJA_INDUK_ID');
            $table->text('SATUAN_KERJA_INDUK_NAMA')->nullable();
            $table->string('SATUAN_KERJA_KERJA_ID')->nullable()->index('1_SATUAN_KERJA_KERJA_ID');
            $table->text('SATUAN_KERJA_KERJA_NAMA')->nullable();
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
