<?php

namespace Kanekescom\Siasn\Simpeg\Traits;

use Illuminate\Http\Client\Response;
use Kanekescom\Siasn\Simpeg\Helpers\SkpIdResponseTransformer;

trait HasSkpEndpoint
{
    public function postSkp2021Save(array $query = []): Response
    {
        return $this->simpeg::{__FUNCTION__}([], $query);
    }

    public function getSkpId($idRiwayatSkp)
    {
        $paths = [
            'idRiwayatSkp' => $idRiwayatSkp,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new SkpIdResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function postSkpSave(array $query = []): Response
    {
        return $this->simpeg::{__FUNCTION__}([], $query);
    }
}
