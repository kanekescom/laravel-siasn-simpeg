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
        Schema::create('siasn_simpeg_pns_list_pensiun_instansi', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('nama')->nullable();
            $table->string('statusUsulan')->nullable();
            $table->string('statusUsulanNama')->nullable();
            $table->string('pnsId', 42)->nullable()->index('8_pnsId');
            $table->string('nipBaru', 18)->nullable();
            $table->string('pertekNomor')->nullable();
            $table->string('skNomor')->nullable();
            $table->string('pathSk')->nullable();
            $table->string('pathPertek')->nullable();
            $table->string('pertekTgl')->nullable();
            $table->string('skTgl')->nullable();
            $table->string('instansiId', 42)->nullable()->index('8_instansiId');
            $table->string('instansiNama')->nullable();
            $table->string('detailLayananNama')->nullable();
            $table->string('tglLahir')->nullable();
            $table->string('golonganId', 42)->nullable()->index('8_golonganId');
            $table->string('golonganKppId', 42)->nullable()->index('8_golonganKppId');
            $table->string('tmtPensiun')->nullable();
            $table->string('pathSkPreview')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_pns_list_pensiun_instansi');
    }
};
