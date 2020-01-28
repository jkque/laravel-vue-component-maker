<?php

namespace Jkque\LaravelVueComponentMaker\Tests;

use Jkque\LaravelVueComponentMaker\LaravelVueComponentMakerServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelVueComponentMakerServiceProvider::class];
    }
}
