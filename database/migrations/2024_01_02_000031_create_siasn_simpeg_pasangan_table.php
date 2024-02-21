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
        Schema::create('siasn_simpeg_pasangan', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('ayahId', 42)->nullable()->index('31_ayahId');
            $table->string('ibuId', 42)->nullable()->index('31_ibuId');
            $table->string('nama')->nullable();
            $table->string('namaKtp')->nullable();
            $table->string('gelarDepan')->nullable();
            $table->string('gelarBlk')->nullable();
            $table->string('tempatLahir')->nullable();
            $table->string('tglLahir')->nullable();
            $table->string('aktaMeninggal')->nullable();
            $table->string('tglMeninggal')->nullable();
            $table->string('jenisKelamin')->nullable()->index('31_jenisKelamin');
            $table->string('jenisAnak')->nullable()->index('31_jenisAnak');
            $table->string('StatusHidup')->nullable()->index('31_StatusHidup');
            $table->string('JenisKawinId', 42)->nullable()->index('31_JenisKawinId');
            $table->string('karisKarsu')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_pasangan');
    }
};
