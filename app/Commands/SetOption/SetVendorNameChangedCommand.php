<?php

namespace App\Commands\SetOption;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use LaravelZero\Framework\Commands\Command;

class SetVendorNameChangedCommand extends Command
{
    protected $signature = 'set:vendorNameChanged';
    protected $description = 'Toggles the vendorNameChanged flag';

    public function handle(): void
    {
        // get the old value...
        $oldValue = config('package.vendorNameChanged');

        // set the new value...
        $newValue = $oldValue == 'true' ? 'false' : 'true';

        // build our target string...
        $target = "'vendorNameChanged' => '" . $oldValue . "'";

        // build our payload string...
        $payload = "'vendorNameChanged' => '" . $newValue . "'";

        // grab our file path...
        $filePath = config_path('package.php');

        // grab the contents of the file using that path...
        $fileContents = File::get($filePath);

        // finally, check if the target string is in the file contents, and then replace it.
        if (Str::contains($fileContents, $target)) {
            File::put($filePath, Str::replaceFirst($target, $payload, $fileContents));
        } else {
            $this->error('Something has gone wrong!');
        }
    }
}
