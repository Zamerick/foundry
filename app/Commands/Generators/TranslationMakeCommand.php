<?php

namespace App\Commands\Generators;

use App\Commands\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class TranslationMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:translation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new translation';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Translation';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return template_path('translation.stub');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the command.'],
        ];
    }
}
