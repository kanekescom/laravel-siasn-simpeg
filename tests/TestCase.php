<?php

namespace Kanekescom\Siasn\Simpeg\Tests;

use Kanekescom\Siasn\Simpeg\SimpegServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            SimpegServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('siasn-api', require __DIR__.'/../vendor/kanekescom/laravel-siasn-api/config/siasn-api.php');
        $app['config']->set('siasn-simpeg-api', require __DIR__.'/../vendor/kanekescom/laravel-siasn-simpeg-api/config/siasn-simpeg-api.php');

        // Pengadaan
        $app['config']->set('siasn-simpeg.params_test.pull_pengadaan_list_pengadaan_instansi_tahun', env('SIASN_PARAMS_TEST_PULL_PENGADAAN_LIST_PENGADAAN_INSTANSI_TAHUN'));

        // PNS
        $app['config']->set('siasn-simpeg.params_test.pull_pns_data_anak_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_DATA_ANAK_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_data_ortu_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_DATA_ORTU_BARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_data_pasangan_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_DATA_PASANGAN_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_data_utama_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_DATA_UTAMA_NIPBARU'));

        // KP
        $app['config']->set('siasn-simpeg.params_test.pull_pns_list_kp_instansi_periode', env('SIASN_PARAMS_TEST_PULL_PNS_LIST_KP_INSTANSI_PERIODE'));

        // Pemberhentian
        $app['config']->set('siasn-simpeg.params_test.pull_pns_list_pensiun_instansi_tahun', env('SIASN_PARAMS_TEST_PULL_PNS_LIST_PENSIUN_INSTANSI_TAHUN'));

        // Riwayat
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_angkakredit_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_ANGKAKREDIT_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_cltn_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_CLTN_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_diklat_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_DIKLAT_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_dp3_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_DP3_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_golongan_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_GOLONGAN_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_hukdis_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_HUKDIS_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_jabatan_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_JABATAN_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_kinerjaperiodik_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_KINERJAPERIODIK_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_kursus_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_KURSUS_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_masakerja_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_MASAKERJA_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_pemberhentian_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_PEMBERHENTIAN_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_pendidikan_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_PENDIDIKAN_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_penghargaan_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_PENGHARGAAN_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_pindahinstansi_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_PINDAHINSTANSI_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_pnsunor_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_PNSUNOR_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_pwk_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_PWK_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_skp_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_SKP_NIPBARU'));
        $app['config']->set('siasn-simpeg.params_test.pull_pns_rw_skp22_nipbaru', env('SIASN_PARAMS_TEST_PULL_PNS_RW_SKP22_NIPBARU'));

        // Referensi
        $app['config']->set('siasn-simpeg.params_test.pull_referensi_ref_unor', env('SIASN_PARAMS_TEST_PULL_REFERENSI_REF_UNOR'));
    }
}
