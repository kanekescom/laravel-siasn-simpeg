<?php

namespace Kanekescom\Siasn\Simpeg\Traits;

use Illuminate\Http\Client\Response;
use Kanekescom\Siasn\Simpeg\Helpers\DiklatIdResponseTransformer;

trait HasDiklatEndpoint
{
    public function getDiklatId($idRiwayatDiklat)
    {
        $paths = [
            'idRiwayatDiklat' => $idRiwayatDiklat,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new DiklatIdResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function postDiklatSave(array $query = []): Response
    {
        return $this->simpeg::{__FUNCTION__}([], $query);
    }
}
