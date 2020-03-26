<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\JobLog;

class ProcessRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $priority;
    protected $group;
    protected $user_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($priority, $group, $user_id)
    {
      $this->priority = $priority;
      $this->group = $group;
      $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $log = JobLog::updateOrCreate([
          "job_id" => $this->job->getJobId(),
        ],[
          "group_id" => $this->group,
          "user_id" => $this->user_id,
          "queue" => $this->priority,
          "payload" => $this->job->getRawBody(),
          "attempts" => $this->job->attempts(),
          "reserved_at" => null,
          "start_execution_datetime" => date("Y-m-d H:i:s"),
          "end_execution_datetime" => null
        ]);

        sleep(3);

        $log->end_execution_datetime = date("Y-m-d H:i:s");
        return $log->save();

    }
}
