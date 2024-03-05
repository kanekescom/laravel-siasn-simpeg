<?php

namespace Kanekescom\Siasn\Simpeg\Traits;

use Illuminate\Http\Client\Response;
use Kanekescom\Siasn\Simpeg\Helpers\KursusIdResponseTransformer;

trait HasKursusEndpoint
{
    public function getKursusId($idRiwayatKursus)
    {
        $paths = [
            'idRiwayatKursus' => $idRiwayatKursus,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new KursusIdResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function postKursusSave(array $query = []): Response
    {
        return $this->simpeg::{__FUNCTION__}([], $query);
    }
}
