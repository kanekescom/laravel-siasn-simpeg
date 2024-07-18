<?php

namespace Kanekescom\Siasn\Simpeg;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SimpegServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-siasn-simpeg')
            ->hasConfigFile()
            ->hasMigrations([
                '2024_01_02_000001_create_siasn_simpeg_pegawai_table',
                '2024_01_02_000002_create_siasn_simpeg_pengadaan_list_pengadaan_instansi_table',
                '2024_01_02_000006_create_siasn_simpeg_pns_data_utama_table',
                '2024_01_02_000007_create_siasn_simpeg_pns_list_kp_instansi_table',
                '2024_01_02_000008_create_siasn_simpeg_pns_list_pensiun_instansi_table',
                '2024_01_02_000010_create_siasn_simpeg_pns_rw_angkakredit_table',
                '2024_01_02_000011_create_siasn_simpeg_pns_rw_cltn_table',
                '2024_01_02_000012_create_siasn_simpeg_pns_rw_diklat_table',
                '2024_01_02_000013_create_siasn_simpeg_pns_rw_dp3_table',
                '2024_01_02_000014_create_siasn_simpeg_pns_rw_golongan_table',
                '2024_01_02_000015_create_siasn_simpeg_pns_rw_hukdis_table',
                '2024_01_02_000016_create_siasn_simpeg_pns_rw_jabatan_table',
                '2024_01_02_000017_create_siasn_simpeg_pns_rw_kinerjaperiodik_table',
                '2024_01_02_000018_create_siasn_simpeg_pns_rw_kursus_table',
                '2024_01_02_000019_create_siasn_simpeg_pns_rw_masakerja_table',
                '2024_01_02_000020_create_siasn_simpeg_pns_rw_pemberhentian_table',
                '2024_01_02_000021_create_siasn_simpeg_pns_rw_pendidikan_table',
                '2024_01_02_000022_create_siasn_simpeg_pns_rw_penghargaan_table',
                '2024_01_02_000023_create_siasn_simpeg_pns_rw_pindahinstansi_table',
                '2024_01_02_000024_create_siasn_simpeg_pns_rw_pnsunor_table',
                '2024_01_02_000025_create_siasn_simpeg_pns_rw_pwk_table',
                '2024_01_02_000026_create_siasn_simpeg_pns_rw_skp_table',
                '2024_01_02_000027_create_siasn_simpeg_pns_rw_skp22_table',
                '2024_01_02_000028_create_siasn_simpeg_referensi_ref_unor_table',
                '2024_07_18_000001_add_nama_sekolah_field_on_siasn_simpeg_pegawai_table',
                '2024_07_18_000002_change_jenis_kawin_id_data_type_on_siasn_simpeg_pegawai_table'
            ])
            ->runsMigrations()
            ->hasCommands([
                Commands\ImportPegawaiCommand::class,
                Commands\PullPnsDataUtamaCommand::class,
                Commands\PullRiwayatCommand::class,
                Commands\PullPengadaanListCommand::class,
                Commands\PullKpListCommand::class,
                Commands\PullPemberhentianPensiunListCommand::class,
                Commands\PullReferensiUnorCommand::class,
            ])
            ->hasInstallCommand(function ($command) {
                $command
                    ->startWith(function ($command) {
                        $command->info('Hello, and welcome to my great laravel package!');
                    })
                    ->publishConfigFile()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('kanekescom/laravel-siasn-simpeg')
                    ->endWith(function ($command) {
                        $command->info('Have a great day!');
                    });
            });
    }
}
