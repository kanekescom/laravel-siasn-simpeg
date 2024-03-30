<?php

namespace Kanekescom\Siasn\Simpeg\Http\Client;

use Kanekescom\Siasn\Simpeg\Api\Http\Client\Pengadaan as PengadaanClient;
use Kanekescom\Siasn\Simpeg\Helpers\PengadaanListResponseTransformer;
use Kanekescom\Siasn\Simpeg\Transformers\PengadaanListPengadaanInstansiTransformer;

class Pengadaan
{
    public static function getList(array $paths = [], array $query = [])
    {
        return new PengadaanListResponseTransformer(
            PengadaanClient::getList($paths, $query),
            new PengadaanListPengadaanInstansiTransformer
        );
    }
}
