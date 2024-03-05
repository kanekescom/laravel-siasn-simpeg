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
        Schema::create('siasn_simpeg_pns_rw_pendidikan', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('idPns', 42)->nullable()->index('21_idPns');
            $table->string('nipBaru', 18)->nullable();
            $table->string('nipLama', 9)->nullable();
            $table->string('pendidikanId', 42)->nullable()->index('21_pendidikanId');
            $table->string('pendidikanNama')->nullable();
            $table->string('tkPendidikanId', 42)->nullable()->index('21_tkPendidikanId');
            $table->string('tkPendidikanNama')->nullable();
            $table->string('tahunLulus', 4)->nullable()->index('21_tahunLulus');
            $table->string('tglLulus')->nullable();
            $table->string('isPendidikanPertama')->nullable()->index('21_isPendidikanPertama');
            $table->string('nomorIjasah')->nullable();
            $table->string('namaSekolah')->nullable();
            $table->string('gelarDepan')->nullable();
            $table->string('gelarBelakang')->nullable();
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
        Schema::dropIfExists('siasn_simpeg_pns_rw_pendidikan');
    }
};
