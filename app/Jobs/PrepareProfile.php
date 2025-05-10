<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class PrepareProfile implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        info('Preparing profile...');
        // Simulate preparing profile
        sleep(5);
        info('Profile prepared successfully!');
        // You can also use a service to prepare the profile
        // ProfileService::prepare($this->profileId);
    }
}
