<?php

namespace Kanekescom\Siasn\Simpeg\Traits;

use Illuminate\Http\Client\Response;
use Kanekescom\Siasn\Simpeg\Helpers\UrlParser;

trait HasPemberhentianEndpoint
{
    public function getPnsListPensiunInstansi(array $paths = [], array $query = []): Response
    {
        $urlFormat = '/pns/list-pensiun-instansi';
        $urlParsed = (new UrlParser($urlFormat))->parse($paths);

        return $this->get($urlParsed, $query);
    }
}
