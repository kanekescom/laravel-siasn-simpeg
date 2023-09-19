<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Kanekescom\Siasn\Api\Simpeg\Facades\Simpeg;
use Kanekescom\Siasn\Simpeg\Transformers\ReferensiUnorApiTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;


class ReferensiUnorApi
{
    private $collection;

    /**
     * Create a new instance.
     */
    public function __construct()
    {
        $response = Simpeg::getRefUnor();
        $data = $response->collect()->get('data');

        $this->collection = null;

        if ($response->ok()) {
            $this->collection = collect([]);
        }

        if ($response->ok() && is_array($data)) {
            $transformer = new ReferensiUnorApiTransformer;
            $manager = new Manager;
            $data = new Collection($data, $transformer);
            $items = $manager->createData($data)->toArray();

            $this->collection = collect($items['data']);
        }
    }

    /**
     * Handle dynamic method calls.
     *
     * @param  string  $method
     * @param  array  $parameters
     */
    public function __call($method, $parameters)
    {
        if (method_exists($this->collection, $method)) {
            return call_user_func_array([$this->collection, $method], $parameters);
        }

        throw new \BadMethodCallException("Method {$method} does not exist.");
    }

    /**
     * Handle dynamic static method calls.
     *
     * @param  string  $method
     * @param  array  $parameters
     */
    public static function __callStatic($method, $parameters)
    {
        if (method_exists((new static)->collection, $method)) {
            return call_user_func_array([(new static)->collection, $method], $parameters);
        }

        throw new \BadMethodCallException("Method {$method} does not exist.");
    }
}
