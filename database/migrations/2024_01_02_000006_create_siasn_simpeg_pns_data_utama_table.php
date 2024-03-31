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
            $table->date('tglLahir_')->nullable();
            $table->string('agama')->nullable();
            $table->unsignedTinyInteger('agamaId')->nullable()->autoIncrement(false)->index('6_agamaId');
            $table->string('email')->nullable();
            $table->string('emailGov')->nullable();
            $table->string('nik')->nullable();
            $table->text('alamat')->nullable();
            $table->string('noHp')->nullable();
            $table->string('noTelp')->nullable();
            $table->string('jenisPegawaiId', 2)->nullable()->index('6_jenisPegawaiId');
            $table->unsignedTinyInteger('mkTahun')->nullable()->autoIncrement(false);
            $table->unsignedTinyInteger('mkBulan')->nullable()->autoIncrement(false);
            $table->text('jenisPegawaiNama')->nullable();
            $table->string('kedudukanPnsId', 2)->nullable()->index('6_kedudukanPnsId');
            $table->text('kedudukanPnsNama')->nullable();
            $table->string('statusPegawai', 8)->nullable();
            $table->string('jenisKelamin', 1)->nullable()->index('6_jenisKelamin');
            $table->string('jenisIdDokumenId', 2)->nullable()->index('6_jenisIdDokumenId');
            $table->text('jenisIdDokumenNama')->nullable();
            $table->string('nomorIdDocument')->nullable();
            $table->string('noSeriKarpeg')->nullable();
            $table->string('tkPendidikanTerakhirId', 2)->nullable()->index('6_tkPendidikanTerakhirId');
            $table->string('tkPendidikanTerakhir')->nullable();
            $table->string('pendidikanTerakhirId', 42)->nullable()->index('6_pendidikanTerakhirId');
            $table->text('pendidikanTerakhirNama')->nullable();
            $table->string('tahunLulus')->nullable();
            $table->date('tahunLulus_')->nullable();
            $table->string('tmtPns')->nullable();
            $table->date('tmtPns_')->nullable();
            $table->string('tmtPensiun')->nullable();
            $table->date('tmtPensiun_')->nullable();
            $table->unsignedTinyInteger('bupPensiun')->nullable()->autoIncrement(false);
            $table->string('tglSkPns')->nullable();
            $table->date('tglSkPns_')->nullable();
            $table->string('tmtCpns')->nullable();
            $table->date('tmtCpns_')->nullable();
            $table->string('tglSkCpns')->nullable();
            $table->date('tglSkCpns_')->nullable();
            $table->string('instansiIndukId', 42)->nullable()->index('6_instansiIndukId');
            $table->text('instansiIndukNama')->nullable();
            $table->string('satuanKerjaIndukId', 42)->nullable()->index('6_satuanKerjaIndukId');
            $table->text('satuanKerjaIndukNama')->nullable();
            $table->string('kanregId', 2)->nullable()->index('6_kanregId');
            $table->text('kanregNama')->nullable();
            $table->string('instansiKerjaId', 42)->nullable()->index('6_instansiKerjaId');
            $table->text('instansiKerjaNama')->nullable();
            $table->string('instansiKerjaKodeCepat', 8)->nullable()->index('6_instansiKerjaKodeCepat');
            $table->string('satuanKerjaKerjaId', 42)->nullable()->index('6_satuanKerjaKerjaId');
            $table->text('satuanKerjaKerjaNama')->nullable();
            $table->string('unorId', 42)->nullable()->index('6_unorId');
            $table->text('unorNama')->nullable();
            $table->string('unorIndukId', 42)->nullable()->index('6_unorIndukId');
            $table->text('unorIndukNama')->nullable();
            $table->unsignedTinyInteger('jenisJabatanId')->nullable()->index('6_jenisJabatanId')->autoIncrement(false);
            $table->string('jenisJabatan')->nullable();
            $table->text('jabatanNama')->nullable();
            $table->string('jabatanStrukturalId', 42)->nullable()->index('6_jabatanStrukturalId');
            $table->text('jabatanStrukturalNama')->nullable();
            $table->string('jabatanFungsionalId', 42)->nullable()->index('6_jabatanFungsionalId');
            $table->text('jabatanFungsionalNama')->nullable();
            $table->string('jabatanFungsionalUmumId', 42)->nullable()->index('6_jabatanFungsionalUmumId');
            $table->text('jabatanFungsionalUmumNama')->nullable();
            $table->string('tmtJabatan')->nullable();
            $table->date('tmtJabatan_')->nullable();
            $table->string('lokasiKerjaId', 42)->nullable()->index('6_lokasiKerjaId');
            $table->string('lokasiKerja')->nullable();
            $table->unsignedTinyInteger('golRuangAwalId')->nullable()->index('6_golRuangAwalId')->autoIncrement(false);
            $table->string('golRuangAwal')->nullable();
            $table->unsignedTinyInteger('golRuangAkhirId')->nullable()->index('6_golRuangAkhirId')->autoIncrement(false);
            $table->string('golRuangAkhir')->nullable();
            $table->string('tmtGolAkhir')->nullable();
            $table->date('tmtGolAkhir_')->nullable();
            $table->string('masaKerja')->nullable();
            $table->string('eselon')->nullable();
            $table->string('eselonId', 10)->nullable()->index('6_eselonId');
            $table->string('eselonLevel', 10)->nullable()->index('6_eselonLevel');
            $table->string('tmtEselon')->nullable();
            $table->date('tmtEselon_')->nullable();
            $table->unsignedBigInteger('gajiPokok')->nullable()->autoIncrement(false);
            $table->string('kpknId', 42)->nullable()->index('6_kpknId');
            $table->text('kpknNama')->nullable();
            $table->string('ktuaId', 42)->nullable()->index('6_ktuaId');
            $table->text('ktuaNama')->nullable();
            $table->string('taspenId', 42)->nullable()->index('6_taspenId');
            $table->text('taspenNama')->nullable();
            $table->unsignedTinyInteger('jenisKawinId')->nullable()->index('6_jenisKawinId')->autoIncrement(false);
            $table->string('statusPerkawinan')->nullable();
            $table->string('statusHidup', 1)->nullable()->index('6_statusHidup');
            $table->string('tglSuratKeteranganDokter')->nullable();
            $table->date('tglSuratKeteranganDokter_')->nullable();
            $table->string('noSuratKeteranganDokter')->nullable();
            $table->unsignedTinyInteger('jumlahIstriSuami')->nullable()->autoIncrement(false);
            $table->unsignedTinyInteger('jumlahAnak')->nullable()->autoIncrement(false);
            $table->string('noSuratKeteranganBebasNarkoba')->nullable();
            $table->string('tglSuratKeteranganBebasNarkoba')->nullable();
            $table->date('tglSuratKeteranganBebasNarkoba_')->nullable();
            $table->string('skck')->nullable();
            $table->string('tglSkck')->nullable();
            $table->date('tglSkck_')->nullable();
            $table->string('akteKelahiran')->nullable();
            $table->string('akteMeninggal')->nullable();
            $table->string('tglMeninggal')->nullable();
            $table->date('tglMeninggal_')->nullable();
            $table->string('noNpwp')->nullable();
            $table->string('tglNpwp')->nullable();
            $table->date('tglNpwp_')->nullable();
            $table->string('noAskes')->nullable();
            $table->string('bpjs')->nullable();
            $table->string('kodePos', 8)->nullable();
            $table->string('noSpmt')->nullable();
            $table->string('noTaspen')->nullable();
            $table->string('bahasa')->nullable();
            $table->string('kppnId', 42)->nullable()->index('6_kppnId');
            $table->text('kppnNama')->nullable();
            $table->string('pangkatAkhir')->nullable();
            $table->string('tglSttpl')->nullable();
            $table->date('tglSttpl_')->nullable();
            $table->text('nomorSttpl')->nullable();
            $table->text('nomorSkCpns')->nullable();
            $table->text('nomorSkPns')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('jabatanAsn')->nullable();
            $table->string('kartuAsn')->nullable();
            $table->boolean('validNik', 1)->nullable()->index('6_validNik');
            $table->string('pangkatAwal')->nullable();
            $table->string('asnJenjangJabatan')->nullable();
            $table->string('levelJabatan')->nullable();
            $table->string('tanggal_taspen')->nullable();
            $table->dateTime('tanggal_taspen_')->nullable();
            $table->string('tabrum2')->nullable();
            $table->string('kelas_jabatan')->nullable();
            $table->string('karis_karsu')->nullable();
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
