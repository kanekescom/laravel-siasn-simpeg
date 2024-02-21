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
        Schema::create('siasn_simpeg_data_pernikahan', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('orangId', 42)->nullable()->index('32_orangId');
            $table->string('pnsOrangId', 42)->nullable()->index('32_pnsOrangId');
            $table->string('tgglMenikah')->nullable();
            $table->string('aktaMenikah')->nullable();
            $table->string('tgglCerai')->nullable();
            $table->string('aktaCerai')->nullable();
            $table->string('posisi')->nullable()->index('32_posisi');
            $table->string('status')->nullable()->index('32_status');
            $table->string('isPns')->nullable()->index('32_isPns');
            $table->string('noSkPensiun')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_data_pernikahan');
    }
};
