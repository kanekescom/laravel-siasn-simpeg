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
        Schema::create('siasn_simpeg_pns_data_anak', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('idPns', 42)->nullable()->index('3_idPns');
            $table->string('nama')->nullable();
            $table->string('jenisKelamin')->nullable()->index('3_jenisKelamin');
            $table->string('jenisAnak')->nullable()->index('3_jenisAnak');
            $table->string('ayahId', 42)->nullable()->index('3_ayahId');
            $table->string('ibuId', 42)->nullable()->index('3_ibuId');
            $table->string('tempatLahir')->nullable();
            $table->string('kabupatenId', 42)->nullable()->index('3_kabupatenId');
            $table->string('tglLahir')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_pns_data_anak');
    }
};
