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
        Schema::create('siasn_simpeg_orangtua_ibu', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('nama')->nullable();
            $table->string('tempatLahir')->nullable();
            $table->string('tglLahir')->nullable();
            $table->string('aktaMeninggal')->nullable();
            $table->string('tglMeninggal')->nullable();
            $table->string('jenisKelamin')->nullable()->index('30_jenisKelamin');
            $table->string('jenisAnak')->nullable()->index('30_jenisAnak');
            $table->string('ibuId', 42)->nullable()->index('30_ibuId');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_orangtua_ibu');
    }
};
