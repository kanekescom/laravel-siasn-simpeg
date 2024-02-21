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
        Schema::create('siasn_simpeg_referensi_ref_unor', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('InstansiId', 42)->nullable()->index('28_InstansiId');
            $table->string('DiatasanId', 42)->nullable()->index('28_DiatasanId');
            $table->string('EselonId', 42)->nullable()->index('28_EselonId');
            $table->string('NamaUnor')->nullable();
            $table->string('NamaJabatan')->nullable();
            $table->string('CepatKode')->nullable()->index('28_CepatKode');
            $table->string('IndukUnorId', 42)->nullable()->index('28_IndukUnorId');
            $table->string('PemimpinPnsId', 42)->nullable()->index('28_PemimpinPnsId');
            $table->string('JenisUnorId', 42)->nullable()->index('28_JenisUnorId');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_referensi_ref_unor');
    }
};
