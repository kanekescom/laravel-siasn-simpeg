<?php

namespace Kanekescom\Siasn\Simpeg;

use Kanekescom\Siasn\Simpeg\Api\Pns as PnsClient;
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
