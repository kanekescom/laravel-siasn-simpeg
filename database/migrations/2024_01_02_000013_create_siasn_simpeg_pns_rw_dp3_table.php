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
        Schema::create('siasn_simpeg_pns_rw_dp3', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('pnsId', 42)->nullable()->index('13_pnsId');
            $table->string('tahun', 4)->nullable()->index('13_tahun');
            $table->string('atasanNonPns')->nullable();
            $table->string('atasanPejabatPenilaiId', 42)->nullable()->index('13_atasanPejabatPenilaiId');
            $table->string('atasanPenilaiGolongan')->nullable();
            $table->string('atasanPenilaiJabatan')->nullable();
            $table->string('atasanPenilaiNama')->nullable();
            $table->string('atasanPenilaiNipNrp')->nullable();
            $table->string('atasanPenilaiTmtGolongan')->nullable();
            $table->string('atasanPenilaiUnorNama')->nullable();
            $table->string('jenisJabatan')->nullable()->index('13_jenisJabatan');
            $table->string('jumlah')->nullable();
            $table->string('kejujuran')->nullable();
            $table->string('kepemimpinan')->nullable();
            $table->string('kerjasama')->nullable();
            $table->string('kesetiaan')->nullable();
            $table->string('ketaatan')->nullable();
            $table->string('nilairatarata')->nullable();
            $table->string('pejabatPenilaiId', 42)->nullable()->index('13_pejabatPenilaiId');
            $table->string('penilaiGolongan')->nullable();
            $table->string('penilaiJabatan')->nullable();
            $table->string('penilaiNama')->nullable();
            $table->string('penilaiNipNrp')->nullable();
            $table->string('penilaiNonPns')->nullable();
            $table->string('penilaiTmtGolongan')->nullable();
            $table->string('penilaiUnorNama')->nullable();
            $table->string('prakarsa')->nullable();
            $table->string('prestasiKerja')->nullable();
            $table->string('statusAtasanPenilai')->nullable()->index('13_statusAtasanPenilai');
            $table->string('statusPenilai')->nullable()->index('13_statusPenilai');
            $table->string('tanggungJawab')->nullable();
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
        Schema::dropIfExists('siasn_simpeg_pns_rw_dp3');
    }
};
