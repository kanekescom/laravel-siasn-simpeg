<?php

namespace Kanekescom\Siasn\Simpeg;

use Kanekescom\Siasn\Simpeg\Api\Referensi as ReferensiClient;
use Kanekescom\Siasn\Simpeg\Helpers\ReferensiUnorResponseTransformer;
use Kanekescom\Siasn\Simpeg\Transformers\ReferensiRefUnorTransformer;

class Referensi
{
    public static function getUnor(array $paths = [], array $query = [])
    {
        return new ReferensiUnorResponseTransformer(
            ReferensiClient::getUnor($paths, $query),
            new ReferensiRefUnorTransformer
        );
    }
}
