<?php

namespace App\Commands\SetOption;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use LaravelZero\Framework\Commands\Command;

class SetGeneratorPaths extends Command
{
    protected $signature = 'set:paths {name}';
    protected $description = 'Sets the default folder structure for packages and file generators.';

    public function handle(): void
    {
        // get the old paths value...
        $oldPaths = config('package.paths');

        // capture the new paths value...
        $newPaths = Str::ucfirst($this->argument('name'));

        // build our target string...
        $target = "'paths' => '" . $oldPaths . "'";

        // build our payload string...
        $payload = "'paths' => '" . $newPaths . "'";

        // grab our file path...
        $filePath = config_path('package.php');

        // grab the contents of the file using that path...
        $fileContents = File::get($filePath);

        // finally, check if the target string is in the file contents, and then replace it.
        if (Str::contains($fileContents, $target)) {
            $this->info('Your configured paths have been updated!');
            File::put($filePath, Str::replaceFirst($target, $payload, $fileContents));
        } else {
            $this->error('Something has gone wrong!');
        }
    }
}
