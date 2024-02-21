<?php

namespace Kanekescom\Siasn\Simpeg\Traits;

use Illuminate\Http\Client\Response;
use Kanekescom\Siasn\Simpeg\Helpers\UrlParser;

trait HasCpnsEndpoint
{
    public function postCpnsSave(array $paths = [], array $query = []): Response
    {
        $urlFormat = '/cpns/save';
        $urlParsed = (new UrlParser($urlFormat))->parse($paths);

        return $this->post($urlParsed, $query);
    }
}
