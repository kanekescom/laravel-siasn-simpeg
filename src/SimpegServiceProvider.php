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
                'create_siasn_simpeg_agama_table',
                'create_siasn_simpeg_alasan_hukuman_disiplin_table',
                'create_siasn_simpeg_asn_jenis_jabatan_table',
                'create_siasn_simpeg_asn_jenjang_jabatan_table',
                'create_siasn_simpeg_eselon_table',
                'create_siasn_simpeg_golongan_table',
                'create_siasn_simpeg_instansi_table',
                'create_siasn_simpeg_jabatan_fungsional_table',
                'create_siasn_simpeg_jabatan_fungsional_umum_table',
                'create_siasn_simpeg_jenis_anak_table',
                'create_siasn_simpeg_jenis_diklat_table',
                'create_siasn_simpeg_jenis_hukuman_table',
                'create_siasn_simpeg_jenis_jabatan_table',
                'create_siasn_simpeg_kanreg_table',
                'create_siasn_simpeg_kedudukan_hukum_table',
                'create_siasn_simpeg_kel_jabatan_table',
                'create_siasn_simpeg_latihan_struktural_table',
                'create_siasn_simpeg_lokasi_table',
                'create_siasn_simpeg_pendidikan_table',
                'create_siasn_simpeg_ref_dokumen_table',
                'create_siasn_simpeg_ref_jenjang_jf_table',
                'create_siasn_simpeg_satuan_kerja_table',
                'create_siasn_simpeg_tingkat_pendidikan_table',
            ])
            ->runsMigrations()
            ->hasCommand(Commands\PullCommand::class);
    }
}
