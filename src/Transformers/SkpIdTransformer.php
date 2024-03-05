<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class SkpIdTransformer extends TransformerAbstract
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
