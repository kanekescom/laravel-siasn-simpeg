<?php

namespace Kanekescom\Siasn\Simpeg;

use Kanekescom\Siasn\Simpeg\Api\Kp as KpClient;
use Kanekescom\Siasn\Simpeg\Helpers\KpListResponseTransformer;
use Kanekescom\Siasn\Simpeg\Transformers\PnsListKpInstansiTransformer;

class Kp
{
    public static function getList(array $paths = [], array $query = [])
    {
        return new KpListResponseTransformer(
            KpClient::getList($paths, $query),
            new PnsListKpInstansiTransformer
        );
    }
}
