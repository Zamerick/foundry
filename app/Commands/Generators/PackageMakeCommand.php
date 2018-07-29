<?php

namespace App\Commands\Generators;

use File;
use Utility;
use Illuminate\Console\Command;

class PackageMakeCommand extends Command
{
    protected $signature = 'make:package {name}';
    protected $description = 'Create a package folder in the currect directory.';

    public function handle()
    {
        // make sure vendor name has been set at least once.
        if (config('package.vendorNameChanged') == false) {
            $this->error("Your vendor name hasn't been set yet! Run parcel set:vendor first.");
            $this->info('You can override the default vendor by passing the --vendor flag with a new vendor name, after you set it the first time');

            return;
        }

        // sanitize name input.
        $name = strtolower($this->argument('name'));
        $location = getcwd();
        $directories = config('package.directories');
        $names = [
            'vendorName' => ['target' => '#VENDORNAME#', 'payload' => strtolower(config('package.vendor'))],
            'packageName' => ['target' => '#PACKAGENAME#', 'payload' => $name],
            'className' => ['target' => '#CLASSNAME#', 'payload' => ucfirst($name) . 'ServiceProvider'],
            'namespace' => ['target' => '#NAMESPACE#', 'payload' => ucfirst(config('package.vendor')) . '\\\\' . ucfirst($name)]
        ];
        $files = [
            [
                'message' => 'Creating basic composer.json file...',
                'stub' => 'composer.json.stub',
                'filename' => 'composer.json'
            ],
            [
                'message' => 'Creating basic service provider file...',
                'stub' => 'provider.stub',
                'filename' => $names['className']['payload'] . '.php'
            ]
        ];

        // Create package folder structure.
        $this->info('Creating top level package directory...');
        foreach ($directories as $directory) {
            $path = $location . '/' . $names['packageName']['payload'] . $directory;
            File::makeDirectory($path, 777, true, true);
        }

        // Create package files
        Utility::createFiles($files, $names, $location, $this);
    }
}