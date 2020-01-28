<?php

namespace Jkque\LaravelVueComponentMaker;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Jkque\LaravelVueComponentMaker\Skeleton\SkeletonClass
 */
class LaravelVueComponentMakerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-vue-component-maker';
    }
}
