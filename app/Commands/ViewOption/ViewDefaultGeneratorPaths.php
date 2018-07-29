<?php

namespace App\Commands\ViewOption;

use LaravelZero\Framework\Commands\Command;

class ViewDefaultGeneratorPaths extends Command
{
    protected $signature = 'view:default_paths';
    protected $description = 'Displays the default generator paths used when creating files.';

    public function handle(): void
    {
        $paths = config('package.default-directories');
        $this->info('The default generator paths are: ' . print_r($paths));
    }
}
