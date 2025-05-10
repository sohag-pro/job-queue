<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendEmail implements ShouldQueue
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
        info('Sending email...');
        // Simulate sending email
        sleep(5);
        info('Email sent successfully!');
        // You can also use a mail service like Mailgun, SendGrid, etc.
        // Mail::to($this->email)->send(new YourMailableClass());
    }
}
