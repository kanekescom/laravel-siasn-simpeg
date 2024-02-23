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
        Schema::create('siasn_simpeg_pns_list_kp_instansi', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('pnsId', 42)->nullable()->index('7_pnsId');
            $table->string('statusUsulan')->nullable();
            $table->string('statusUsulanNama')->nullable();
            $table->string('nipBaru', 18)->nullable();
            $table->string('nama')->nullable();
            $table->string('no_pertek')->nullable();
            $table->string('no_sk')->nullable();
            $table->string('path_ttd_sk')->nullable();
            $table->string('path_ttd_pertek')->nullable();
            $table->string('tgl_pertek')->nullable();
            $table->string('tgl_sk')->nullable();
            $table->string('golonganBaruId', 42)->nullable()->index('7_golonganBaruId');
            $table->string('tmtKp')->nullable();
            $table->string('path_preview_sk')->nullable();
            $table->string('gaji_pokok_baru')->nullable();
            $table->string('gaji_pokok_lama')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_pns_list_kp_instansi');
    }
};
