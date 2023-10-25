<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Kanekescom\Siasn\Simpeg\Transformers\PegawaiCsvTransformer;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class PegawaiCsv
{
    private $collection;

    private $delimiter = ',';

    /**
     * Create a new instance.
     */
    public function __construct(string $filePath)
    {
        $reader = Reader::createFromPath($filePath);
        $reader->setDelimiter($this->delimiter);
        $reader->setHeaderOffset(0);

        $data = iterator_to_array(Statement::create()
            ->process($reader)
            ->getRecords());

        $this->collection = null;

        if (is_array($data)) {
            $transformer = new PegawaiCsvTransformer;
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
