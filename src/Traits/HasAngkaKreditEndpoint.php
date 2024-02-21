<?php

namespace Kanekescom\Siasn\Simpeg\Traits;

trait HasAngkaKreditEndpoint
{
    public function deleteAngkakreditDelete(array $paths = [], array $query = []): Response
    {
        $urlFormat = '/angkakredit/delete/{idRiwayatAngkaKredit}';
        $urlParsed = (new UrlParser($urlFormat))->parse($paths);

        return $this->delete($urlParsed, $query);
    }

    public function getAngkakreditId(array $paths = [], array $query = []): Response
    {
        $urlFormat = '/angkakredit/id/{idRiwayatAngkaKredit}';
        $urlParsed = (new UrlParser($urlFormat))->parse($paths);

        return $this->get($urlParsed, $query);
    }

    public function postAngkakreditSave(array $paths = [], array $query = []): Response
    {
        $urlFormat = '/angkakredit/save';
        $urlParsed = (new UrlParser($urlFormat))->parse($paths);

        return $this->post($urlParsed, $query);
    }
}