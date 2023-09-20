<?php

namespace Kanekescom\Siasn\Simpeg\Presenters;

use Kanekescom\Siasn\Simpeg\Transformers\PegawaiTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class PegawaiPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PegawaiTransformer();
    }
}
