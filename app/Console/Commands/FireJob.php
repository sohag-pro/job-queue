<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FireJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fire-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Firing job...');

        // Dispatch the job
        \App\Jobs\SendEmail::dispatch();

        $this->info('Job dispatched successfully!');
        // You can also dispatch multiple jobs in a batch
        \Illuminate\Support\Facades\Bus::batch([
            new \App\Jobs\PrepareProfile(),
            new \App\Jobs\SendEmail(),
        ])->dispatch();
        $this->info('Batch of jobs dispatched successfully!');

        // You can also dispatch jobs with a delay
        \App\Jobs\SendEmail::dispatch()->delay(now()->addMinutes(5));
        $this->info('Job dispatched with a delay successfully!');
    }
}
