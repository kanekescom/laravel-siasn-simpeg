<?php

namespace Kanekescom\Siasn\Simpeg\Presenters;

use Kanekescom\Siasn\Simpeg\Transformers\DataUtamaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class DataUtamaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DataUtamaTransformer();
    }
}
