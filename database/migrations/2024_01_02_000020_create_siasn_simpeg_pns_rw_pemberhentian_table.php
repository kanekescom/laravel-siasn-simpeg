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
        Schema::create('siasn_simpeg_pns_rw_pemberhentian', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('jenisHenti', 2)->nullable()->index('20_jenisHenti');
            $table->string('kedudukanHukumPns', 2)->nullable()->index('20_kedudukanHukumPns');
            $table->string('pnsOrang', 42)->nullable()->index('20_pnsOrang');
            $table->string('skNomor')->nullable();
            $table->string('skTanggal')->nullable();
            $table->date('skTanggal_')->nullable();
            $table->string('asalId', 42)->nullable()->index('20_asalId');
            $table->string('asalNama')->nullable();
            $table->string('asalNamaLabel')->nullable();
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
        Schema::dropIfExists('siasn_simpeg_pns_rw_pemberhentian');
    }
};
