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
            return $this->option('report')
                ? template_path('exception-render-report.stub')
                : template_path('exception-render.stub');
        }

        return $this->option('report')
            ? template_path('exception-report.stub')
            : template_path('exception.stub');
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
