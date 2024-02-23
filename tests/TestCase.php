<?php

namespace Kanekescom\Siasn\Simpeg\Tests;

use Kanekescom\Siasn\Simpeg\SimpegServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            SimpegServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('siasn-api', require __DIR__.'/../vendor/kanekescom/laravel-siasn-api/config/siasn-api.php');
        $app['config']->set('siasn-simpeg-api', require __DIR__.'/../vendor/kanekescom/laravel-siasn-simpeg-api/config/siasn-simpeg-api.php');
    }
}
