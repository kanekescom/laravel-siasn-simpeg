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
        Schema::create('siasn_simpeg_pull_tracking', function (Blueprint $table) {
            $table->id();
            $table->string('command');
            $table->integer('start_from')->default(0);
            $table->integer('last_try')->default(0);
            $table->integer('amount')->default(0);
            $table->timestamp('done_at', 0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_pull_tracking');
    }
};
