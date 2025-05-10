<?php

namespace App\Jobs\Middleware;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PreventDuplicateJobs
{
    /**
     * Process the queued job.
     *
     * @param  mixed  $job
     * @param  callable  $next
     * @return mixed
     */
    public function handle($job, $next)
    {
        // Create a unique key for this job type + payload
        $jobSignature = get_class($job);
        
        // If the job has a uniqueId property, use that as well
        if (isset($job->uniqueId)) {
            $jobSignature .= ':' . $job->uniqueId;
        } else {
            // Otherwise serialize the job to get a unique signature
            $jobSignature .= ':' . md5(serialize($job));
        }
        
        $lockKey = 'job_lock:' . md5($jobSignature);
        
        // Check if this job was executed within the last 5 minutes
        if (Cache::has($lockKey)) {
            Log::info('Job skipped as it was executed recently', [
                'job' => get_class($job),
                'uniqueId' => $job->uniqueId ?? 'none'
            ]);
            
            // Don't process the job
            return;
        }
        
        // Set a cache key for 5 minutes to prevent duplicate execution
        Cache::put($lockKey, true, now()->addMinutes(5));
        
        // Process the job
        $next($job);
    }
}