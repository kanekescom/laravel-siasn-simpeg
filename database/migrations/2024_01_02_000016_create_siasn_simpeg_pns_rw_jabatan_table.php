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
        Schema::create('siasn_simpeg_pns_rw_jabatan', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('idPns', 42)->nullable()->index('16_idPns');
            $table->string('nipBaru', 18)->nullable();
            $table->string('nipLama', 9)->nullable();
            $table->string('jenisJabatan')->nullable()->index('16_jenisJabatan');
            $table->string('instansiKerjaId', 42)->nullable()->index('16_instansiKerjaId');
            $table->string('instansiKerjaNama')->nullable();
            $table->string('satuanKerjaId', 42)->nullable()->index('16_satuanKerjaId');
            $table->string('satuanKerjaNama')->nullable();
            $table->string('unorId', 42)->nullable()->index('16_unorId');
            $table->string('unorNama')->nullable();
            $table->string('unorIndukId', 42)->nullable()->index('16_unorIndukId');
            $table->string('unorIndukNama')->nullable();
            $table->string('eselon')->nullable();
            $table->string('eselonId', 42)->nullable()->index('16_eselonId');
            $table->string('jabatanFungsionalId', 42)->nullable()->index('16_jabatanFungsionalId');
            $table->string('jabatanFungsionalNama')->nullable();
            $table->string('jabatanFungsionalUmumId', 42)->nullable()->index('16_jabatanFungsionalUmumId');
            $table->string('jabatanFungsionalUmumNama')->nullable();
            $table->string('tmtJabatan')->nullable();
            $table->string('nomorSk')->nullable();
            $table->string('tanggalSk')->nullable();
            $table->string('namaUnor')->nullable();
            $table->string('namaJabatan')->nullable();
            $table->string('tmtPelantikan')->nullable();
            $table->json('path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_pns_rw_jabatan');
    }
};
