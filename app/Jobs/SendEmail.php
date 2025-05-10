<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Jobs\Middleware\PreventDuplicateJobs;

class SendEmail implements ShouldQueue
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
        info('Sending email...');
        // Simulate sending email
        sleep(5);
        info('Email sent successfully!');
        // You can also use a mail service like Mailgun, SendGrid, etc.
        // Mail::to($this->email)->send(new YourMailableClass());
    }
}
