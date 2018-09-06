<?php

namespace App\Commands\Generators;

use Illuminate\Support\Str;
use App\Commands\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class ListenerMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:listener';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new event listener class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Listener';

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $event = $this->option('event');

        if (!Str::startsWith($event, [
            $this->laravel->getNamespace(),
            'Illuminate',
            '\\',
        ])) {
            $event = $this->laravel->getNamespace() . 'Events\\' . $event;
        }

        $stub = str_replace(
            'DummyEvent',
            class_basename($event),
            parent::buildClass($name)
        );

        return str_replace(
            'DummyFullEvent',
            $event,
            $stub
        );
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('queued')) {
            $stub = $this->option('event') ? 'listener-queued.stub' : 'listener-queued-duck.stub';
        } else {
            $stub =  $this->option('event') ? 'listener.stub' : 'listener-duck.stub';
        }
        return template_path('Listener' . DIRECTORY_SEPARATOR . $stub);
    }

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
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['event', 'e', InputOption::VALUE_OPTIONAL, 'The event class being listened for.'],

            ['queued', null, InputOption::VALUE_NONE, 'Indicates the event listener should be queued.'],
        ];
    }
}
