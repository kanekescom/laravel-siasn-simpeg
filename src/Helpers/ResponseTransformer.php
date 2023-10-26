<?php

namespace Kanekescom\Siasn\Simpeg\Helpers;

use Illuminate\Http\Client\Response;
use Kanekescom\Helperia\Support\ClassExtender;
use League\Fractal\TransformerAbstract;

class ResponseTransformer extends ClassExtender
{
    public function __construct(Response $response, TransformerAbstract $transformer)
    {
        if ($response->ok() == false) {
            $this->class = collect([]);

            return;
        }

        $data = $response->collect()->get('results');

        if (is_array($data)) {
            $items = fractal($data, $transformer)->toArray();

            $this->class = collect($items['data']);

            return;
        }

        $data = $response->collect()->get('results');

        if (is_array($data)) {
            $items = fractal($data, $transformer)->toArray();

            $this->class = collect($items['data']);

            return;
        }

        $data = $response->collect()->toArray();

        if (is_array($data)) {
            $items = fractal($data, $transformer)->toArray();

            $this->class = collect($items['data']);

            return;
        }
    }
}
