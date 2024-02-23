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
        Schema::create('siasn_simpeg_pns_rw_skp', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('tahun')->nullable()->index('26_tahun');
            $table->string('nilaiSkp')->nullable();
            $table->string('orientasiPelayanan')->nullable();
            $table->string('integritas')->nullable();
            $table->string('komitmen')->nullable();
            $table->string('disiplin')->nullable();
            $table->string('kerjasama')->nullable();
            $table->string('nilaiPerilakuKerja')->nullable();
            $table->string('nilaiPrestasiKerja')->nullable();
            $table->string('kepemimpinan')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('nilairatarata')->nullable();
            $table->string('atasanPejabatPenilai')->nullable()->index('26_atasanPejabatPenilai');
            $table->string('pejabatPenilai')->nullable()->index('26_pejabatPenilai');
            $table->string('pns')->nullable()->index('26_pns');
            $table->string('atasanNonPns')->nullable();
            $table->string('penilaiNonPns')->nullable();
            $table->string('penilaiNipNrp')->nullable();
            $table->string('atasanPenilaiNipNrp')->nullable();
            $table->string('penilaiNama')->nullable();
            $table->string('atasanPenilaiNama')->nullable();
            $table->string('penilaiUnorNama')->nullable();
            $table->string('atasanPenilaiUnorNama')->nullable();
            $table->string('penilaiJabatan')->nullable();
            $table->string('atasanPenilaiJabatan')->nullable();
            $table->string('penilaiGolongan')->nullable();
            $table->string('atasanPenilaiGolongan')->nullable();
            $table->string('penilaiTmtGolongan')->nullable();
            $table->string('atasanPenilaiTmtGolongan')->nullable();
            $table->string('statusPenilai')->nullable()->index('26_statusPenilai');
            $table->string('statusAtasanPenilai')->nullable()->index('26_statusAtasanPenilai');
            $table->string('jenisJabatan')->nullable()->index('26_jenisJabatan');
            $table->string('jenisPeraturanKinerjaKd')->nullable()->index('26_jenisPeraturanKinerjaKd');
            $table->string('inisiatifKerja')->nullable();
            $table->string('konversiNilai')->nullable();
            $table->string('nilaiIntegrasi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_pns_rw_skp');
    }
};
