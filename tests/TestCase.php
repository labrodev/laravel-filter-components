<?php

namespace Labrodev\Filters\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Labrodev\Filters\FilterServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            FilterServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {

    }
}
