<?php

namespace Kanekescom\Siasn\Simpeg\Traits;

use Illuminate\Http\Client\Response;
use Kanekescom\Siasn\Simpeg\Helpers\UrlParser;

trait HasJabatanEndpoint
{
    public function getJabatanId(array $paths = [], array $query = []): Response
    {
        $urlFormat = '/jabatan/id/{idRiwayatJabatan}';
        $urlParsed = (new UrlParser($urlFormat))->parse($paths);

        return $this->get($urlParsed, $query);
    }

    public function getJabatanPns(array $paths = [], array $query = []): Response
    {
        $urlFormat = '/jabatan/pns/{nipBaru}';
        $urlParsed = (new UrlParser($urlFormat))->parse($paths);

        return $this->get($urlParsed, $query);
    }

    public function postJabatanSave(array $query = []): Response
    {
        return $this->simpeg::{__FUNCTION__}([], $query);
    }
}
