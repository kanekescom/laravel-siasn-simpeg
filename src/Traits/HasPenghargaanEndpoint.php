<?php

namespace Kanekescom\Siasn\Simpeg\Traits;

use Illuminate\Http\Client\Response;
use Kanekescom\Siasn\Simpeg\Helpers\PenghargaanIdResponseTransformer;

trait HasPenghargaanEndpoint
{
    public function getPenghargaanId($idRiwayatPenghargaan)
    {
        $paths = [
            'idRiwayatPenghargaan' => $idRiwayatPenghargaan,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new PenghargaanIdResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function postPenghargaanSave(array $query = []): Response
    {
        return $this->simpeg::{__FUNCTION__}([], $query);
    }
}
