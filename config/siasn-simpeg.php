<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | This option controls which model will be used when using this library.
    |
    */

    'models' => [
        'data_anak' => Kanekescom\Siasn\Simpeg\Models\DataAnak::class,
        'data_ortu' => Kanekescom\Siasn\Simpeg\Models\DataOrtu::class,
        'data_pasangan' => Kanekescom\Siasn\Simpeg\Models\DataPasangan::class,
        'data_utama' => Kanekescom\Siasn\Simpeg\Models\DataUtama::class,
        'list_kp_instansi' => Kanekescom\Siasn\Simpeg\Models\ListKpInstansi::class,
        'list_pengadaan_instansi' => Kanekescom\Siasn\Simpeg\Models\ListPengadaanInstansi::class,
        'list_pensiun_instansi' => Kanekescom\Siasn\Simpeg\Models\ListPensiunInstansi::class,
        'referensi_unor' => Kanekescom\Siasn\Simpeg\Models\ReferensiUnor::class,
        'rw_angka_kredit' => Kanekescom\Siasn\Simpeg\Models\RwAngkaKredit::class,
        'rw_cltn' => Kanekescom\Siasn\Simpeg\Models\RwCltn::class,
        'rw_diklat' => Kanekescom\Siasn\Simpeg\Models\RwDiklat::class,
        'rw_dp3' => Kanekescom\Siasn\Simpeg\Models\RwDp3::class,
        'rw_golongan' => Kanekescom\Siasn\Simpeg\Models\RwGolongan::class,
        'rw_hukdis' => Kanekescom\Siasn\Simpeg\Models\RwHukdis::class,
        'rw_jabatan' => Kanekescom\Siasn\Simpeg\Models\RwJabatan::class,
        'rw_kursus' => Kanekescom\Siasn\Simpeg\Models\RwKursus::class,
        'rw_masa_kerja' => Kanekescom\Siasn\Simpeg\Models\RwMasaKerja::class,
        'rw_pemberhentian' => Kanekescom\Siasn\Simpeg\Models\RwPemberhentian::class,
        'rw_pendidikan' => Kanekescom\Siasn\Simpeg\Models\RwPendidikan::class,
        'rw_penghargaan' => Kanekescom\Siasn\Simpeg\Models\RwPenghargaan::class,
        'rw_pindah_instansi' => Kanekescom\Siasn\Simpeg\Models\RwPindahInstansi::class,
        'rw_pwk' => Kanekescom\Siasn\Simpeg\Models\RwPwk::class,
        'rw_skp' => Kanekescom\Siasn\Simpeg\Models\RwSkp::class,
        'rw_skp22' => Kanekescom\Siasn\Simpeg\Models\RwSkp22::class,
        'rw_unor' => Kanekescom\Siasn\Simpeg\Models\RwUnor::class,
    ],

    'chunk_data' => 500,

    'delete_model_before_pull' => true,

];
