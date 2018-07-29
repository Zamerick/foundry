<?php

namespace App\Commands\ViewOption;

use LaravelZero\Framework\Commands\Command;

class ViewCustomGeneratorPaths extends Command
{
    protected $signature = 'view:custom_paths';
    protected $description = 'Displays the currently configured generator paths.';

    public function handle(): void
    {
        $paths = config('package.paths');
        $this->info('The current custom generator paths are: ' . print_r($paths));
    }
}
