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
            $table->string('jenisHenti')->nullable();
            $table->string('kedudukanHukumPns')->nullable();
            $table->string('pnsOrang')->nullable();
            $table->string('skNomor')->nullable();
            $table->string('skTanggal')->nullable();
            $table->string('asalId', 42)->nullable()->index('20_asalId');
            $table->string('asalNama')->nullable();
            $table->string('asalNamaLabel')->nullable()->index('20_asalNamaLabel');
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
