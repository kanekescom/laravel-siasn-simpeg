<?php

namespace Kanekescom\Siasn\Simpeg\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kanekescom\Siasn\Simpeg\Simpeg
 */
class Simpeg extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Kanekescom\Siasn\Simpeg\Simpeg::class;
    }
}
