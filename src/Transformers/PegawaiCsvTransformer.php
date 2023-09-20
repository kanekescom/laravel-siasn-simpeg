<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PegawaiCsvTransformer extends TransformerAbstract
{
    /**
     * Transform the Pegawai model.
     *
     * @param  Kanekescom\Siasn\Simpeg\Models\PegawaiCsv  $item
     */
    public function transform(array $item): array
    {
        return [
            /* place your other model properties here */
            'pns_id' => $item['PNS ID'],
            'nip_baru' => $item['NIP BARU'],
            'nip_lama' => $item['NIP LAMA'],
            'nama' => $item['NAMA'],
            'gelar_depan' => $item['GELAR DEPAN'],
            'gelar_belakang' => $item['GELAR BELAKANG'],
            'tempat_lahir_id' => $item['TEMPAT LAHIR ID'],
            'tempat_lahir_nama' => $item['TEMPAT LAHIR NAMA'],
            'tanggal_lahir' => $item['TANGGAL LAHIR'],
            'jenis_kelamin' => $item['JENIS KELAMIN'],
            'agama_id' => $item['AGAMA ID'],
            'agama_nama' => $item['AGAMA NAMA'],
            'jenis_kawin_id' => $item['JENIS KAWIN ID'],
            'jenis_kawin_nama' => $item['JENIS KAWIN NAMA'],
            'nik' => $item['NIK'],
            'nomor_hp' => $item['NOMOR HP'],
            'email' => $item['EMAIL'],
            'email_gov' => $item['EMAIL GOV'],
            'alamat' => $item['ALAMAT'],
            'npwp_nomor' => $item['NPWP NOMOR'],
            'bpjs' => $item['BPJS'],
            'jenis_pegawai_id' => $item['JENIS PEGAWAI ID'],
            'jenis_pegawai_nama' => $item['JENIS PEGAWAI NAMA'],
            'kedudukan_hukum_id' => $item['KEDUDUKAN HUKUM ID'],
            'kedudukan_hukum_nama' => $item['KEDUDUKAN HUKUM NAMA'],
            'status_cpns_pns' => $item['STATUS CPNS PNS'],
            'kartu_asn_virtual' => $item['KARTU ASN VIRTUAL'],
            'nomor_sk_cpns' => $item['NOMOR SK CPNS'],
            'tanggal_sk_cpns' => $item['TANGGAL SK CPNS'],
            'tmt_cpns' => $item['TMT CPNS'],
            'nomor_sk_pns' => $item['NOMOR SK PNS'],
            'tanggal_sk_pns' => $item['TANGGAL SK PNS'],
            'tmt_pns' => $item['TMT PNS'],
            'gol_awal_id' => $item['GOL AWAL ID'],
            'gol_awal_nama' => $item['GOL AWAL NAMA'],
            'gol_akhir_id' => $item['GOL AKHIR ID'],
            'gol_akhir_nama' => $item['GOL AKHIR NAMA'],
            'tmt_golongan' => $item['TMT GOLONGAN'],
            'mk_tahun' => $item['MK TAHUN'],
            'mk_bulan' => $item['MK BULAN'],
            'jenis_jabatan_id' => $item['JENIS JABATAN ID'],
            'jenis_jabatan_nama' => $item['JENIS JABATAN NAMA'],
            'jabatan_id' => $item['JABATAN ID'],
            'jabatan_nama' => $item['JABATAN NAMA'],
            'tmt_jabatan' => $item['TMT JABATAN'],
            'tingkat_pendidikan_id' => $item['TINGKAT PENDIDIKAN ID'],
            'tingkat_pendidikan_nama' => $item['TINGKAT PENDIDIKAN NAMA'],
            'pendidikan_id' => $item['PENDIDIKAN ID'],
            'pendidikan_nama' => $item['PENDIDIKAN NAMA'],
            'tahun_lulus' => $item['TAHUN LULUS'],
            'kpkn_id' => $item['KPKN ID'],
            'kpkn_nama' => $item['KPKN NAMA'],
            'lokasi_kerja_id' => $item['LOKASI KERJA ID'],
            'lokasi_kerja_nama' => $item['LOKASI KERJA NAMA'],
            'unor_id' => $item['UNOR ID'],
            'unor_nama' => $item['UNOR NAMA'],
            'instansi_induk_id' => $item['INSTANSI INDUK ID'],
            'instansi_induk_nama' => $item['INSTANSI INDUK NAMA'],
            'instansi_kerja_id' => $item['INSTANSI KERJA ID'],
            'instansi_kerja_nama' => $item['INSTANSI KERJA NAMA'],
            'satuan_kerja_induk_id' => $item['SATUAN KERJA INDUK ID'],
            'satuan_kerja_induk_nama' => $item['SATUAN KERJA INDUK NAMA'],
            'satuan_kerja_kerja_id' => $item['SATUAN KERJA KERJA ID'],
            'satuan_kerja_kerja_nama' => $item['SATUAN KERJA KERJA NAMA'],

            // 'created_at' => $item['created_at'],
            // 'updated_at' => $item['updated_at'],
            // 'deleted_at' => $item['deleted_at'],
        ];
    }
}
