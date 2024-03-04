<?php

namespace Kanekescom\Siasn\Simpeg\Traits;

use Illuminate\Http\Client\Response;
use Kanekescom\Siasn\Simpeg\Helpers\HukdisIdResponseTransformer;

trait HasHukdisEndpoint
{
    public function getHukdisId($idRiwayatHukdis)
    {
        $paths = [
            'idRiwayatHukdis' => $idRiwayatHukdis,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new HukdisIdResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function postHukdisSave(array $query = []): Response
    {
        return $this->simpeg::{__FUNCTION__}([], $query);
    }
}
