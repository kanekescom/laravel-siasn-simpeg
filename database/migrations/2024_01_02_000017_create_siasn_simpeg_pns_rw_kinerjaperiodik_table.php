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
        Schema::create('siasn_simpeg_pns_rw_kinerjaperiodik', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('tahun')->nullable()->index('17_tahun');
            $table->string('nip')->nullable()->index('17_nip');
            $table->string('nama')->nullable();
            $table->string('hasilKinerja')->nullable();
            $table->string('hasilKinerjaNilai')->nullable();
            $table->string('instansiId', 42)->nullable()->index('17_instansiId');
            $table->string('instansiNama')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('koefisenId', 42)->nullable()->index('17_koefisenId');
            $table->string('kriteria')->nullable();
            $table->string('kuadranKinerjaNilai')->nullable()->index('17_kuadranKinerjaNilai');
            $table->string('kuadranNilai')->nullable()->index('17_kuadranNilai');
            $table->string('namaPenilai')->nullable();
            $table->string('penilaiGolonganId', 42)->nullable()->index('17_penilaiGolonganId');
            $table->string('penilaiJabatanNama')->nullable();
            $table->string('penilaiNipNrp')->nullable()->index('17_NipNrp');
            $table->string('penilaiPnsId', 42)->nullable()->index('17_penilaiPnsId');
            $table->string('penilaiUnorNm')->nullable();
            $table->string('perilakuKerja')->nullable();
            $table->string('perilakuKerjaNilai')->nullable();
            $table->string('periodikId', 42)->nullable()->index('17_periodikId');
            $table->string('periodikNama')->nullable();
            $table->string('persentase')->nullable();
            $table->string('pnsDinilaiId', 42)->nullable()->index('17_pnsDinilaiId');
            $table->string('statusPenilai')->nullable()->index('17_statusPenilai');
            $table->string('unorId', 42)->nullable()->index('17_unorId');
            $table->string('unorNama')->nullable();
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
        Schema::dropIfExists('siasn_simpeg_pns_rw_kinerjaperiodik');
    }
};
