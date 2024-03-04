<?php

namespace Kanekescom\Siasn\Simpeg\Traits;

use Illuminate\Http\Client\Response;
use Kanekescom\Siasn\Simpeg\Helpers\AngkakreditIdResponseTransformer;

trait HasAngkaKreditEndpoint
{
    public function deleteAngkakreditDelete($idRiwayatAngkaKredit): Response
    {
        $paths = [
            'idRiwayatAngkaKredit' => $idRiwayatAngkaKredit,
        ];

        return $this->simpeg::{__FUNCTION__}($paths);
    }

    public function getAngkakreditId($idRiwayatAngkaKredit)
    {
        $paths = [
            'idRiwayatAngkaKredit' => $idRiwayatAngkaKredit,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new AngkakreditIdResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function postAngkakreditSave(array $query = []): Response
    {
        return $this->simpeg::{__FUNCTION__}([], $query);
    }
}
