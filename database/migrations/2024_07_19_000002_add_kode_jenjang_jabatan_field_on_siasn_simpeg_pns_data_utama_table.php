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
        Schema::table('siasn_simpeg_pns_data_utama', function (Blueprint $table) {
            $table->string('kode_jenjang_jabatan', 2)->after('asnJenjangJabatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siasn_simpeg_pns_data_utama', function (Blueprint $table) {
            $table->dropColumn('kode_jenjang_jabatan');
        });
    }
};
