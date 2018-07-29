<?php

namespace App\Commands\Misc;

use Illuminate\Console\Command;

class OutputAllCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calls all the other Foundry commands (except make:package) for testing purposes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('make:channel', ['name' => 'newChannel']);
        $this->call('make:command', ['name' => 'newCommand']);
        $this->call('make:controller', ['name' => 'newController']);
        $this->call('make:event', ['name' => 'newEvent']);
        $this->call('make:exception', ['name' => 'newException']);
        $this->call('make:factory', ['name' => 'newFactory']);
        $this->call('make:job', ['name' => 'newJob']);
        $this->call('make:listener', ['name' => 'newListener']);
        $this->call('make:mail', ['name' => 'newMail']);
        $this->call('make:middleware', ['name' => 'newMiddleware']);
        $this->call('make:model', ['name' => 'newModel']);
        $this->call('make:notification', ['name' => 'newNotification']);
        $this->call('make:policy', ['name' => 'newPolicy']);
        $this->call('make:provider', ['name' => 'newProvider']);
        $this->call('make:query', ['name' => 'newQuery']);
        $this->call('make:request', ['name' => 'newRequest']);
        // Resource outputs
        $this->call('make:resource', ['name' => 'newResource']);
        //$this->call('make:resource', ['name' => 'newResourceAgain', 'collection' => 'default']);
        $this->call('make:resource', ['name' => 'newCollection']);

        $this->call('make:rule', ['name' => 'newRule']);
        $this->call('make:seeder', ['name' => 'newSeeder']);
        //$this->call('make:test', ['name' => 'newTest']);
        $this->call('make:trait', ['name' => 'newTrait']);
        //$this->call('make:translation', ['name' => 'newTranslation']);
    }
}
