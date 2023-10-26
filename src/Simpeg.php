<?php

namespace Kanekescom\Siasn\Simpeg;

use Kanekescom\Siasn\Simpeg\Helpers\ResponseTransformer;

class Simpeg
{
    private $simpeg;

    public function __construct()
    {
        $this->simpeg = new \Kanekescom\Siasn\Api\Simpeg\Facades\Simpeg;
    }

    public function getAgama($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getAgama($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\AgamaTransformer
        );
    }

    public function getAlasanHukumanDisiplin($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getAlasanHukumanDisiplin($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\AlasanHukumanDisiplinTransformer
        );
    }

    public function getAsnJenisJabatan($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getAsnJenisJabatan($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\AsnJenisJabatanTransformer
        );
    }

    public function getAsnJenjangJabatan($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getAsnJenjangJabatan($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\AsnJenjangJabatanTransformer
        );
    }

    public function getEselon($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getEselon($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\EselonTransformer
        );
    }

    public function getGolongan($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getGolongan($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\GolonganTransformer
        );
    }

    public function getInstansi($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getInstansi($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\InstansiTransformer
        );
    }

    public function getJabatanFungsional($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getJabatanFungsional($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\JabatanFungsionalTransformer
        );
    }

    public function getJabatanFungsionalUmum($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getJabatanFungsionalUmum($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\JabatanFungsionalUmumTransformer
        );
    }

    public function getJenisAnak($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getJenisAnak($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\JenisAnakTransformer
        );
    }

    public function getJenisDiklat($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getJenisDiklat($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\JenisDiklatTransformer
        );
    }

    public function getJenisHukuman($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getJenisHukuman($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\JenisHukumanTransformer
        );
    }

    public function getJenisJabatan($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getJenisJabatan($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\JenisJabatanTransformer
        );
    }

    public function getKanreg($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getKanreg($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\KanregTransformer
        );
    }

    public function getKedudukanHukum($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getKedudukanHukum($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\KedudukanHukumTransformer
        );
    }

    public function getKelJabatan($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getKelJabatan($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\KelJabatanTransformer
        );
    }

    public function getLatihanStruktural($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getLatihanStruktural($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\LatihanStrukturalTransformer
        );
    }

    public function getLokasi($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getLokasi($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\LokasiTransformer
        );
    }

    public function getPendidikan($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getPendidikan($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\PendidikanTransformer
        );
    }

    public function getRefDokumen($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getRefDokumen($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\RefDokumenTransformer
        );
    }

    public function getRefJenjangJf($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getRefJenjangJf($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\RefJenjangJfTransformer
        );
    }

    public function getSatuanKerja($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getSatuanKerja($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\SatuanKerjaTransformer
        );
    }

    public function getTingkatPendidikan($query = [])
    {
        return new ResponseTransformer(
            $this->simpeg::getTingkatPendidikan($query),
            new \Kanekescom\Siasn\Simpeg\Transformers\TingkatPendidikanTransformer
        );
    }
}
