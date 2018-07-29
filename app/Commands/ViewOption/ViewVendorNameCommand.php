<?php

namespace App\Commands\ViewOption;

use LaravelZero\Framework\Commands\Command;

class ViewVendorNameCommand extends Command
{
    protected $signature = 'view:vendor';
    protected $description = 'Displays the currently configured custom generator paths used when creating files.';

    public function handle(): void
    {
        $this->info('The currently configured vendor name is: ' . config('package.vendor'));
    }
}
