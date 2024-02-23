<?php

namespace Kanekescom\Siasn\Simpeg\Traits;

use Kanekescom\Siasn\Simpeg\Helpers\RiwayatResponseTransformer;

trait HasRiwayatEndpoint
{
    public function getPnsRwAngkakredit($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwCltn($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwDiklat($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwDp3($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwGolongan($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwHukdis($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwJabatan($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwKinerjaperiodik($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwKursus($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwMasakerja($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwPemberhentian($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwPendidikan($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwPenghargaan($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwPindahinstansi($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwPnsunor($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwPwk($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwSkp($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }

    public function getPnsRwSkp22($nipBaru)
    {
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $response = $this->simpeg::{__FUNCTION__}($paths);
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new RiwayatResponseTransformer(
            $response,
            new $transformerClass
        );
    }
}
