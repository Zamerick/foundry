<?php

namespace App\Commands\Generators;

use App\Commands\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class ExceptionMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:exception';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new custom exception class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Exception';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('render')) {
            $stub = $this->option('report') ? 'exception-render-report.stub' : 'exception-render.stub';
        } else {
            $stub = $this->option('report') ? 'exception-report.stub' : 'exception.stub';
        }
        return template_path('Exception' . DIRECTORY_SEPARATOR . $stub);
    }

    /**
     * Determine if the class already exists.
     *
     * @param  string  $rawName
     * @return bool
     */
    protected function alreadyExists($rawName)
    {
        return class_exists($this->rootNamespace() . 'Exceptions\\' . $rawName);
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['render', null, InputOption::VALUE_NONE, 'Create the exception with an empty render method.'],

            ['report', null, InputOption::VALUE_NONE, 'Create the exception with an empty report method.'],
        ];
    }
}
