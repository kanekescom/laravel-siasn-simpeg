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
            $table->unsignedTinyInteger('golongan')->nullable()->index('15_golongan')->autoIncrement(false);
            $table->string('kedudukanHukum')->nullable();
            $table->string('jenisHukuman', 2)->nullable()->index('15_jenisHukuman');
            $table->string('pnsOrang', 42)->nullable()->index('15_pnsOrang');
            $table->string('skNomor')->nullable();
            $table->string('skTanggal')->nullable();
            $table->date('skTanggal_')->nullable();
            $table->string('hukumanTanggal')->nullable();
            $table->date('hukumanTanggal_')->nullable();
            $table->unsignedTinyInteger('masaTahun')->nullable()->autoIncrement(false);
            $table->unsignedTinyInteger('masaBulan')->nullable()->autoIncrement(false);
            $table->string('akhirHukumTanggal')->nullable();
            $table->date('akhirHukumTanggal_')->nullable();
            $table->string('nomorPp')->nullable();
            $table->unsignedTinyInteger('golonganLama')->nullable()->index('15_golonganLama')->autoIncrement(false);
            $table->string('skPembatalanNomor')->nullable();
            $table->string('skPembatalanTanggal')->nullable();
            $table->date('skPembatalanTanggal_')->nullable();
            $table->string('alasanHukumanDisiplin', 42)->nullable()->index('15_alasanHukumanDisiplin');
            $table->string('alasanHukumanDisiplinNama')->nullable();
            $table->string('jenisHukumanNama')->nullable();
            $table->json('path')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('jenisTingkatHukumanId', 1)->nullable()->index('15_jenisTingkatHukumanId');
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
