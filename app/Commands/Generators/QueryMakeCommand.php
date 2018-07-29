<?php

namespace App\Commands\Generators;

use App\Commands\GeneratorCommand;

class QueryMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:query';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new query class.';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Query';

    /**
       * Determine if the class already exists.
       *
       * @param  string  $rawName
       * @return bool
       */
    protected function alreadyExists($rawName)
    {
        return class_exists($rawName);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return template_path('query.stub');
    }
}
