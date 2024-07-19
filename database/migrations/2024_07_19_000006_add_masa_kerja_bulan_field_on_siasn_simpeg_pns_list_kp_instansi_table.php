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
        Schema::table('siasn_simpeg_pns_list_kp_instansi', function (Blueprint $table) {
            $table->unsignedTinyInteger('masa_kerja_bulan')->after('masa_kerja_tahun')->nullable()->autoIncrement(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siasn_simpeg_pns_list_kp_instansi', function (Blueprint $table) {
            $table->dropColumn('masa_kerja_bulan');
        });
    }
};
