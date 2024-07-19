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
            $table->string('tglSpmt')->after('noSpmt')->nullable();
            $table->date('tglSpmt_')->after('tglSpmt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siasn_simpeg_pns_data_utama', function (Blueprint $table) {
            $table->dropColumn('tglSpmt', 'tglSpmt_');
        });
    }
};
