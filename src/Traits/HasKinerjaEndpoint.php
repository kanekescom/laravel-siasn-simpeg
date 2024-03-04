<?php

namespace Kanekescom\Siasn\Simpeg\Traits;

use Illuminate\Http\Client\Response;

trait HasKinerjaEndpoint
{
    public function deleteKinerjaperiodikDelete($idRiwayatKinerjaPeriodik): Response
    {
        $paths = [
            'idRiwayatKinerjaPeriodik' => $idRiwayatKinerjaPeriodik,
        ];

        return $this->simpeg::{__FUNCTION__}($paths);
    }

    public function postKinerjaperiodikSave(array $query = []): Response
    {
        return $this->simpeg::{__FUNCTION__}([], $query);
    }
}
