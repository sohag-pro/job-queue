<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Jobs\Middleware\PreventDuplicateJobs;

class PrepareProfile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Unique identifier for this job.
     * 
     * @var string|null
     */
    public $uniqueId;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the middleware the job should pass through.
     *
     * @return array
     */
    public function middleware()
    {
        // return [new PreventDuplicateJobs];
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
