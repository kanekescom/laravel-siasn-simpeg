<?php

namespace Kanekescom\Siasn\Simpeg\Presenters;

use Kanekescom\Siasn\Simpeg\Transformers\RiwayatJabatanTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class RiwayatJabatanPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RiwayatJabatanTransformer();
    }
}
