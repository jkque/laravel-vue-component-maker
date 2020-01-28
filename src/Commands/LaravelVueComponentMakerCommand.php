<?php

namespace Jkque\LaravelVueComponentMaker\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use InvalidArgumentException;
use Illuminate\Filesystem\Filesystem;

class LaravelVueComponentMakerCommand extends Command
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Create a new migration creator instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'make:vue-component {name : The name of the vue component.}
        {--path= : The path of the vue component from config.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new vue component file';

    

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $name = Str::studly(trim($this->input->getArgument('name')));
        $path = config('laravel-vue-component-maker.path');

        if(!is_null($this->input->getOption('path'))){
            $path = $path.'/'.$this->input->getOption('path');
        }
        
        //Everything is okay
        $this->writeComponent($name, $path);
    }

    /**
     * Write the vue component file to disk.
     *
     * @param  string  $name
     * @param  string  $path
     * @return string
     */
    protected function writeComponent($name, $path)
    {
        $this->ensureComponentDoesntAlreadyExist($name, $path);

        $stub = $this->populateStub();
        $this->files->put($this->getPath($name, $path), $stub);
        $this->line("<info>Created Vue Component:</info> {$name}");
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function populateStub()
    {
        return $this->files->get(__DIR__.'/stubs/vue.stub');
    }


    /**
     * Ensure that a vue component with the given name doesn't already exist.
     *
     * @param  string  $path
     * @param  string  $name
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    protected function ensureComponentDoesntAlreadyExist($name, $path)
    {
        if (file_exists($path.'/'.$name.'.vue')) {
            throw new InvalidArgumentException("A {$name} component already exists.");
        }

        if (!$this->files->isDirectory($dir = dirname($path))) {
            $this->files->makeDirectory($dir, 0777, true, true);
        }
        
    }

    /**
     * Get the full path to the vue component.
     *
     * @param  string  $name
     * @param  string  $path
     * @return string
     */
    protected function getPath($name, $path)
    {
        return $path.'/'.$name.'.vue';
    }
}