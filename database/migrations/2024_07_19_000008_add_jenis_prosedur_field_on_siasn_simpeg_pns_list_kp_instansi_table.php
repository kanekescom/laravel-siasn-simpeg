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
            $table->string('jenis_prosedur', 1)->after('jenis_kp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siasn_simpeg_pns_list_kp_instansi', function (Blueprint $table) {
            $table->dropColumn('jenis_prosedur');
        });
    }
};
