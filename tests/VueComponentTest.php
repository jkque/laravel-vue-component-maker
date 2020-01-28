<?php

namespace Jkque\LaravelVueComponentMaker\Tests;

use Jkque\LaravelVueComponentMaker\LaravelVueComponentMakerServiceProvider;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Filesystem\Filesystem;

class VueComponentTest extends TestCase
{
    /** @test */
    public function it_can_read_config_file()
    {
        $this->assertStringContainsString('/assets/js/components', config('laravel-vue-component-maker.path'));
    }

    /** @test */
    public function it_can_create_vue_component()
    {
        config(['laravel-vue-component-maker.path' => __DIR__.'/temp/']);
        $this->app->make(Kernel::class)->call('make:vue-component', [
            'name' => 'SampleComponent'
        ]);
        $this->assertTrue(file_exists(config('laravel-vue-component-maker.path').'/SampleComponent.vue'));
    }

    /** @test */
    public function it_can_create_from_other_path()
    {
        config(['laravel-vue-component-maker.path' => __DIR__.'/temp/']);
        $this->app->make(Kernel::class)->call('make:vue-component',[
            'name' => 'SampleComponent',
            '--path' => 'temp_2'
        ]);
        $this->assertTrue(file_exists(config('laravel-vue-component-maker.path').'/SampleComponent.vue'));
    }
}
