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
        Schema::table('siasn_simpeg_pegawai', function (Blueprint $table) {
            $table->text('nama_sekolah')->after('is_valid_nik')->nullable();
            $table->text('flag_ikd')->after('nama_sekolah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siasn_simpeg_pegawai', function (Blueprint $table) {
            $table->dropColumn('nama_sekolah', 'flag_ikd');
        });
    }
};
