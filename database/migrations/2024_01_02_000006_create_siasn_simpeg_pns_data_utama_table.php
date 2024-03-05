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
        Schema::create('siasn_simpeg_pns_data_utama', function (Blueprint $table) {
            $table->string('id', 42)->primary();
            $table->string('nipBaru', 18);
            $table->string('nipLama', 9);
            $table->string('nama')->nullable();
            $table->string('gelarDepan')->nullable();
            $table->string('gelarBelakang')->nullable();
            $table->string('tempatLahir')->nullable();
            $table->string('tempatLahirId', 42)->nullable()->index('6_tempatLahirId');
            $table->string('tglLahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('agamaId', 2)->nullable()->index('6_agamaId');
            $table->string('email')->nullable();
            $table->string('emailGov')->nullable();
            $table->string('nik', 16)->nullable();
            $table->text('alamat')->nullable();
            $table->string('noHp')->nullable();
            $table->string('noTelp')->nullable();
            $table->string('jenisPegawaiId', 42)->nullable()->index('6_jenisPegawaiId');
            $table->string('mkTahun', 2)->nullable();
            $table->string('mkBulan', 2)->nullable();
            $table->string('jenisPegawaiNama')->nullable();
            $table->string('kedudukanPnsId', 2)->nullable()->index('6_kedudukanPnsId');
            $table->string('kedudukanPnsNama')->nullable();
            $table->string('statusPegawai')->nullable();
            $table->string('jenisKelamin', 1)->nullable()->index('6_jenisKelamin');
            $table->string('jenisIdDokumenId', 2)->nullable()->index('6_jenisIdDokumenId');
            $table->string('jenisIdDokumenNama')->nullable();
            $table->text('nomorIdDocument')->nullable();
            $table->text('noSeriKarpeg')->nullable();
            $table->string('tkPendidikanTerakhirId', 2)->nullable()->index('6_tkPendidikanTerakhirId');
            $table->string('tkPendidikanTerakhir')->nullable();
            $table->string('pendidikanTerakhirId', 42)->nullable()->index('6_pendidikanTerakhirId');
            $table->string('pendidikanTerakhirNama')->nullable();
            $table->string('tahunLulus', 4)->nullable();
            $table->string('tmtPns')->nullable();
            $table->string('tmtPensiun')->nullable();
            $table->string('bupPensiun', 2)->nullable();
            $table->string('tglSkPns')->nullable();
            $table->string('tmtCpns')->nullable();
            $table->string('tglSkCpns')->nullable();
            $table->string('instansiIndukId', 42)->nullable()->index('6_instansiIndukId');
            $table->text('instansiIndukNama')->nullable();
            $table->string('satuanKerjaIndukId', 42)->nullable()->index('6_satuanKerjaIndukId');
            $table->text('satuanKerjaIndukNama')->nullable();
            $table->string('kanregId', 42)->nullable()->index('6_kanregId');
            $table->text('kanregNama')->nullable();
            $table->string('instansiKerjaId', 42)->nullable()->index('6_instansiKerjaId');
            $table->text('instansiKerjaNama')->nullable();
            $table->string('instansiKerjaKodeCepat')->nullable()->index('6_instansiKerjaKodeCepat');
            $table->string('satuanKerjaKerjaId', 42)->nullable()->index('6_satuanKerjaKerjaId');
            $table->text('satuanKerjaKerjaNama')->nullable();
            $table->string('unorId', 42)->nullable()->index('6_unorId');
            $table->text('unorNama')->nullable();
            $table->string('unorIndukId', 42)->nullable()->index('6_unorIndukId');
            $table->text('unorIndukNama')->nullable();
            $table->string('jenisJabatanId', 42)->nullable()->index('6_jenisJabatanId');
            $table->string('jenisJabatan')->nullable();
            $table->text('jabatanNama')->nullable();
            $table->string('jabatanStrukturalId', 42)->nullable()->index('6_jabatanStrukturalId');
            $table->text('jabatanStrukturalNama')->nullable();
            $table->string('jabatanFungsionalId', 42)->nullable()->index('6_jabatanFungsionalId');
            $table->text('jabatanFungsionalNama')->nullable();
            $table->string('jabatanFungsionalUmumId', 42)->nullable()->index('6_jabatanFungsionalUmumId');
            $table->text('jabatanFungsionalUmumNama')->nullable();
            $table->string('tmtJabatan')->nullable();
            $table->string('lokasiKerjaId', 42)->nullable()->index('6_lokasiKerjaId');
            $table->string('lokasiKerja')->nullable();
            $table->string('golRuangAwalId', 2)->nullable()->index('6_golRuangAwalId');
            $table->string('golRuangAwal')->nullable();
            $table->string('golRuangAkhirId', 2)->nullable()->index('6_golRuangAkhirId');
            $table->string('golRuangAkhir')->nullable();
            $table->string('tmtGolAkhir')->nullable();
            $table->string('masaKerja')->nullable();
            $table->string('eselon')->nullable();
            $table->string('eselonId', 10)->nullable()->index('6_eselonId');
            $table->string('eselonLevel', 10)->nullable()->index('6_eselonLevel');
            $table->string('tmtEselon', 10)->nullable();
            $table->string('gajiPokok')->nullable();
            $table->string('kpknId', 42)->nullable()->index('6_kpknId');
            $table->text('kpknNama')->nullable();
            $table->string('ktuaId', 42)->nullable()->index('6_ktuaId');
            $table->text('ktuaNama')->nullable();
            $table->string('taspenId', 42)->nullable()->index('6_taspenId');
            $table->text('taspenNama')->nullable();
            $table->string('jenisKawinId', 2)->nullable()->index('6_jenisKawinId');
            $table->string('statusPerkawinan')->nullable();
            $table->string('statusHidup', 1)->nullable()->index('6_statusHidup');
            $table->string('tglSuratKeteranganDokter')->nullable();
            $table->text('noSuratKeteranganDokter')->nullable();
            $table->string('jumlahIstriSuami')->nullable();
            $table->string('jumlahAnak')->nullable();
            $table->text('noSuratKeteranganBebasNarkoba')->nullable();
            $table->string('tglSuratKeteranganBebasNarkoba')->nullable();
            $table->string('skck')->nullable();
            $table->string('tglSkck')->nullable();
            $table->string('akteKelahiran')->nullable();
            $table->string('akteMeninggal')->nullable();
            $table->string('tglMeninggal')->nullable();
            $table->text('noNpwp')->nullable();
            $table->string('tglNpwp')->nullable();
            $table->text('noAskes')->nullable();
            $table->string('bpjs')->nullable();
            $table->string('kodePos', 8)->nullable();
            $table->text('noSpmt')->nullable();
            $table->text('noTaspen')->nullable();
            $table->string('bahasa')->nullable();
            $table->string('kppnId', 42)->nullable()->index('6_kppnId');
            $table->text('kppnNama')->nullable();
            $table->string('pangkatAkhir')->nullable();
            $table->string('tglSttpl')->nullable();
            $table->text('nomorSttpl')->nullable();
            $table->text('nomorSkCpns')->nullable();
            $table->text('nomorSkPns')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('jabatanAsn')->nullable();
            $table->string('kartuAsn')->nullable();
            $table->string('validNik', 1)->nullable()->index('6_validNik');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siasn_simpeg_pns_data_utama');
    }
};
