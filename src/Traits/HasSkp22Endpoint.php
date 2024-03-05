<?php

namespace Kanekescom\Siasn\Simpeg\Traits;

use Illuminate\Http\Client\Response;
use Kanekescom\Siasn\Simpeg\Helpers\Skp22IdResponseTransformer;

trait HasSkp22Endpoint
{
    public function getSkp22Id($idRiwayatSkp)
    {
        $paths = [
            'idRiwayatSkp' => $idRiwayatSkp,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new Skp22IdResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function postSkp22Save(array $query = []): Response
    {
        return $this->simpeg::{__FUNCTION__}([], $query);
    }
}
