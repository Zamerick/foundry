<?php

namespace App\Commands\SetOption;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use LaravelZero\Framework\Commands\Command;

class SetVendorNameCommand extends Command
{
    protected $signature = 'set:vendor {name}';
    protected $description = 'Sets the default vendor name to use while creating packages.';

    public function handle(): void
    {
        // get the old vendor value...
        $oldVendor = config('package.vendor');

        // get the new vendor value, and make sure its capitalized...
        $newVendor = Str::ucfirst($this->argument('name'));

        // build our target string...
        $target = "'vendor' => '" . $oldVendor . "'";

        // build our payload string...
        $payload = "'vendor' => '" . $newVendor . "'";

        // grab our file path...
        $filePath = config_path('package.php');

        // grab the contents of the file using that path...
        $fileContents = File::get($filePath);

        // finally, check if the target string is in the file contents, and then replace it.
        if (Str::contains($fileContents, $target)) {
            $this->info('Your vendor name has been updated!');
            File::put($filePath, Str::replaceFirst($target, $payload, $fileContents));
        } else {
            $this->error('Something has gone wrong!');
        }
        // call command to update the vendorNameSet flag if its false.
        if (config('package.vendorNameChanged') == 'false') {
            $this->call('set:VendorNameChanged');
        }
    }
}
