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
        Schema::create('siasn_simpeg_pns_rw_skp22', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('hasilKinerja')->nullable();
            $table->string('hasilKinerjaNilai')->nullable();
            $table->string('kuadranKinerja')->nullable();
            $table->string('KuadranKinerjaNilai')->nullable();
            $table->string('namaPenilai')->nullable();
            $table->string('nipNrpPenilai')->nullable()->index('27_nipNrpPenilai');
            $table->string('penilaiGolonganId', 42)->nullable()->index('27_penilaiGolonganId');
            $table->string('penilaiJabatanNm')->nullable();
            $table->string('penilaiUnorNm')->nullable();
            $table->string('perilakuKerja')->nullable();
            $table->string('PerilakuKerjaNilai')->nullable();
            $table->string('pnsDinilaiId', 42)->nullable()->index('27_pnsDinilaiId');
            $table->string('statusPenilai')->nullable()->index('27_statusPenilai');
            $table->string('tahun')->nullable()->index('27_tahun');
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
        Schema::dropIfExists('siasn_simpeg_pns_rw_skp22');
    }
};
