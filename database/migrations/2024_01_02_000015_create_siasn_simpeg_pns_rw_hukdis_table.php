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
        Schema::create('siasn_simpeg_pns_rw_hukdis', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('rwHukumanDisiplin')->nullable();
            $table->string('golongan')->nullable();
            $table->string('kedudukanHukum')->nullable();
            $table->string('jenisHukuman')->nullable()->index('15_jenisHukuman');
            $table->string('pnsOrang')->nullable()->index('15_pnsOrang');
            $table->string('skNomor')->nullable();
            $table->string('skTanggal')->nullable();
            $table->string('hukumanTanggal')->nullable();
            $table->string('masaTahun')->nullable();
            $table->string('masaBulan')->nullable();
            $table->string('akhirHukumTanggal')->nullable();
            $table->string('nomorPp')->nullable();
            $table->string('golonganLama')->nullable();
            $table->string('skPembatalanNomor')->nullable();
            $table->string('skPembatalanTanggal')->nullable();
            $table->string('alasanHukumanDisiplin')->nullable()->index('15_alasanHukumanDisiplin');
            $table->string('alasanHukumanDisiplinNama')->nullable();
            $table->string('jenisHukumanNama')->nullable();
            $table->json('path')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('jenisTingkatHukumanId', 42)->nullable()->index('15_jenisTingkatHukumanId');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_pns_rw_hukdis');
    }
};
