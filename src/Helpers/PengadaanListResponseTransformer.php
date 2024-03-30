<?php

namespace Kanekescom\Siasn\Simpeg\Helpers;

use Illuminate\Http\Client\Response;
use Kanekescom\Helperia\Support\ClassExtender;
use League\Fractal\TransformerAbstract;

class PengadaanListResponseTransformer extends ClassExtender
{
    public function __construct(Response $response, TransformerAbstract $transformer)
    {
        if ($response->ok() == false) {
            $this->class = collect([]);

            return;
        }

        $data = $response->collect()->get('data');

        if (is_array($data)) {
            $items = fractal($data, $transformer)->toArray();

            $this->class = collect($items['data']);

            return;
        }

        return $this->class = collect();
    }
}
