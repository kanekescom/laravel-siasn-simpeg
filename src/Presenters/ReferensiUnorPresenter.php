<?php

namespace Kanekescom\Siasn\Simpeg\Presenters;

use Kanekescom\Siasn\Simpeg\Transformers\ReferensiUnorTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ReferensiUnorPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ReferensiUnorTransformer();
    }
}
