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
        Schema::create('siasn_simpeg_pns_data_pasangan', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('idPns', 42)->nullable()->index('5_idPns');
            $table->string('pasangan_id')->nullable()->index('5_pasangan_id');
            $table->string('statusNikah')->nullable()->index('5_statusNikah');
            $table->string('dataPernikahan_id')->nullable()->index('5_dataPernikahan_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_pns_data_pasangan');
    }
};
