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
        Schema::create('siasn_simpeg_pns_rw_penghargaan', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('tahun', 4)->nullable()->index('22_tahun');
            $table->string('skNomor')->nullable();
            $table->string('skDate')->nullable();
            $table->date('skDate_')->nullable();
            $table->string('hargaNama')->nullable();
            $table->string('hargaId', 3)->nullable()->index('22_hargaId');
            $table->string('pnsOrangId', 42)->nullable()->index('22_pnsOrangId');
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
        Schema::dropIfExists('siasn_simpeg_pns_rw_penghargaan');
    }
};
