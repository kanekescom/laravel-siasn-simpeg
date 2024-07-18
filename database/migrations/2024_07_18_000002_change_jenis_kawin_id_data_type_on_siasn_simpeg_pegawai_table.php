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
            $table->string('jenis_kawin_id', 1)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siasn_simpeg_pegawai', function (Blueprint $table) {
            $table->unsignedTinyInteger('jenis_kawin_id')->nullable()->index('1_jenis_kawin_id')->autoIncrement(false);
        });
    }
};
