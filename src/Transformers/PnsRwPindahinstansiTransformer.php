<?php

namespace Kanekescom\Siasn\Pegawai\Transformers;

use League\Fractal\TransformerAbstract;

class PnsRwPindahinstansiTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        return $item;
    }
}