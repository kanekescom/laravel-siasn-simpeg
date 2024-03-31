<?php

namespace Kanekescom\Siasn\Simpeg\Http\Client;

use Kanekescom\Siasn\Simpeg\Api\Http\Client\Pns as PnsClient;
use Kanekescom\Siasn\Simpeg\Helpers\PnsDataUtamaResponseTransformer;
use Kanekescom\Siasn\Simpeg\Transformers\PnsDataUtamaTransformer;

class Pns
{
    public static function getDataUtama(array|string $paths = [], array $query = [])
    {
        return new PnsDataUtamaResponseTransformer(
            PnsClient::getDataUtama($paths, $query),
            new PnsDataUtamaTransformer
        );
    }
}
