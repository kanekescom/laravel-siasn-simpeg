<?php

namespace Kanekescom\Siasn\Simpeg;

class Simpeg
{
    use \Kanekescom\Siasn\Simpeg\Traits\HasAngkaKreditEndpoint;
    use \Kanekescom\Siasn\Simpeg\Traits\HasCpnsEndpoint;
    use \Kanekescom\Siasn\Simpeg\Traits\HasDiklatEndpoint;
    use \Kanekescom\Siasn\Simpeg\Traits\HasHukdisEndpoint;
    use \Kanekescom\Siasn\Simpeg\Traits\HasJabatanEndpoint;
    use \Kanekescom\Siasn\Simpeg\Traits\HasKinerjaEndpoint;
    use \Kanekescom\Siasn\Simpeg\Traits\HasKpEndpoint;
    use \Kanekescom\Siasn\Simpeg\Traits\HasKursusEndpoint;
    use \Kanekescom\Siasn\Simpeg\Traits\HasPemberhentianEndpoint;
    use \Kanekescom\Siasn\Simpeg\Traits\HasPengadaanEndpoint;
    use \Kanekescom\Siasn\Simpeg\Traits\HasPenghargaanEndpoint;
    use \Kanekescom\Siasn\Simpeg\Traits\HasPnsEndpoint;
    use \Kanekescom\Siasn\Simpeg\Traits\HasReferensiEndpoint;
    use \Kanekescom\Siasn\Simpeg\Traits\HasRiwayatEndpoint;
    use \Kanekescom\Siasn\Simpeg\Traits\HasSkp22Endpoint;
    use \Kanekescom\Siasn\Simpeg\Traits\HasSkpEndpoint;
    use \Kanekescom\Siasn\Simpeg\Traits\HasUploadEndpoint;

    private $simpeg;

    public function __construct()
    {
        $this->simpeg = new \Kanekescom\Siasn\Api\Simpeg\Facades\Simpeg;
    }
}
