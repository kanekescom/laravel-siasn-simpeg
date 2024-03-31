<?php

namespace Kanekescom\Siasn\Simpeg\Http\Client;

use Kanekescom\Siasn\Simpeg\Api\Http\Client\Riwayat as RiwayatClient;
use Kanekescom\Siasn\Simpeg\Helpers\RiwayatResponseTransformer;
use Kanekescom\Siasn\Simpeg\Transformers;

class Riwayat
{
    public static function getAngkakredit(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getAngkakredit($paths, $query),
            new Transformers\PnsRwAngkakreditTransformer
        );
    }

    public static function getCltn(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getCltn($paths, $query),
            new Transformers\PnsRwCltnTransformer
        );
    }

    public static function getDiklat(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getDiklat($paths, $query),
            new Transformers\PnsRwDiklatTransformer
        );
    }

    public static function getDp3(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getDp3($paths, $query),
            new Transformers\PnsRwDp3Transformer
        );
    }

    public static function getGolongan(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getGolongan($paths, $query),
            new Transformers\PnsRwGolonganTransformer
        );
    }

    public static function getHukdis(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getHukdis($paths, $query),
            new Transformers\PnsRwHukdisTransformer
        );
    }

    public static function getJabatan(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getJabatan($paths, $query),
            new Transformers\PnsRwJabatanTransformer
        );
    }

    public static function getKinerjaperiodik(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getKinerjaperiodik($paths, $query),
            new Transformers\PnsRwKinerjaperiodikTransformer
        );
    }

    public static function getKursus(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getKursus($paths, $query),
            new Transformers\PnsRwKursusTransformer
        );
    }

    public static function getMasakerja(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getMasakerja($paths, $query),
            new Transformers\PnsRwMasakerjaTransformer
        );
    }

    public static function getPemberhentian(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getPemberhentian($paths, $query),
            new Transformers\PnsRwPemberhentianTransformer
        );
    }

    public static function getPendidikan(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getPendidikan($paths, $query),
            new Transformers\PnsRwPendidikanTransformer
        );
    }

    public static function getPenghargaan(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getPenghargaan($paths, $query),
            new Transformers\PnsRwPenghargaanTransformer
        );
    }

    public static function getPindahinstansi(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getPindahinstansi($paths, $query),
            new Transformers\PnsRwPindahinstansiTransformer
        );
    }

    public static function getPnsunor(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getPnsunor($paths, $query),
            new Transformers\PnsRwPnsunorTransformer
        );
    }

    public static function getPwk(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getPwk($paths, $query),
            new Transformers\PnsRwPwkTransformer
        );
    }

    public static function getSkp(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getSkp($paths, $query),
            new Transformers\PnsRwSkpTransformer
        );
    }

    public static function getSkp22(array|string $paths = [], array $query = [])
    {
        return new RiwayatResponseTransformer(
            RiwayatClient::getSkp22($paths, $query),
            new Transformers\PnsRwSkp22Transformer
        );
    }
}
