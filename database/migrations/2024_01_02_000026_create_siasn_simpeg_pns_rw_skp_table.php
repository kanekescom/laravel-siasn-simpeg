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
            $table->string('tahun', 4)->nullable()->index('26_tahun');
            $table->decimal('nilaiSkp', 5, 2)->nullable();
            $table->decimal('orientasiPelayanan', 5, 2)->nullable();
            $table->decimal('integritas', 5, 2)->nullable();
            $table->decimal('komitmen', 5, 2)->nullable();
            $table->decimal('disiplin', 5, 2)->nullable();
            $table->decimal('kerjasama', 5, 2)->nullable();
            $table->decimal('nilaiPerilakuKerja', 5, 2)->nullable();
            $table->decimal('nilaiPrestasiKerja', 5, 2)->nullable();
            $table->decimal('kepemimpinan', 5, 2)->nullable();
            $table->decimal('jumlah', 5, 2)->nullable();
            $table->decimal('nilairatarata', 5, 2)->nullable();
            $table->string('atasanPejabatPenilai', 42)->nullable()->index('26_atasanPejabatPenilai');
            $table->string('pejabatPenilai', 42)->nullable()->index('26_pejabatPenilai');
            $table->string('pns', 42)->nullable()->index('26_pns');
            $table->string('atasanNonPns')->nullable();
            $table->string('penilaiNonPns')->nullable();
            $table->string('penilaiNipNrp')->nullable()->index('26_penilaiNipNrp');
            $table->string('atasanPenilaiNipNrp')->nullable()->index('26_atasanPenilaiNipNrp');
            $table->string('penilaiNama')->nullable();
            $table->string('atasanPenilaiNama')->nullable();
            $table->string('penilaiUnorNama')->nullable();
            $table->string('atasanPenilaiUnorNama')->nullable();
            $table->string('penilaiJabatan')->nullable();
            $table->string('atasanPenilaiJabatan')->nullable();
            $table->unsignedTinyInteger('penilaiGolongan')->nullable()->index('26_penilaiGolongan')->autoIncrement(false);
            $table->unsignedTinyInteger('atasanPenilaiGolongan')->nullable()->index('26_atasanPenilaiGolongan')->autoIncrement(false);
            $table->string('penilaiTmtGolongan')->nullable();
            $table->date('penilaiTmtGolongan_')->nullable();
            $table->string('atasanPenilaiTmtGolongan')->nullable();
            $table->date('atasanPenilaiTmtGolongan_')->nullable();
            $table->string('statusPenilai')->nullable()->index('26_statusPenilai');
            $table->string('statusAtasanPenilai')->nullable()->index('26_statusAtasanPenilai');
            $table->unsignedTinyInteger('jenisJabatan')->nullable()->index('26_jenisJabatan')->autoIncrement(false);
            $table->string('jenisPeraturanKinerjaKd')->nullable()->index('26_jenisPeraturanKinerjaKd');
            $table->decimal('inisiatifKerja', 5, 2)->nullable();
            $table->decimal('konversiNilai', 5, 2)->nullable();
            $table->decimal('nilaiIntegrasi', 5, 2)->nullable();
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
