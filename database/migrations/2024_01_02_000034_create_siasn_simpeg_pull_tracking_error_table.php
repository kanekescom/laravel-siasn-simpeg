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
        Schema::create('siasn_simpeg_pull_tracking_error', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pull_tracking_id');
            $table->string('pns_id', 42);
            $table->longText('error');
            $table->timestamp('done_at', 0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_pull_tracking_error');
    }
};
