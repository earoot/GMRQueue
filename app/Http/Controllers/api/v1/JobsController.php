<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jobs\ProcessRequest;
use App\Models\JobLog;
use Response;

class JobsController extends Controller
{

    public function schedule(Request $request)
    {
      $data = $request->all();

      $total = (isset($data["total"]) && ((Int) $data["total"])>0) ? $data["total"] : 1;
      $delay = (isset($data["delay"]) && ((Int) $data["delay"])>0) ? $data["delay"] : 0;
      $queue = (isset($data["priority"]) ? $data["priority"] : "low");
      $group = md5(date("Y-m-d H:i:s"));
      $user_id = Auth::user()->id;

      $counter = 0;
      for ($i=0; $i < $total; $i++) {
        $job = (new ProcessRequest($queue, $group, $user_id))->onQueue($queue);
        if($delay>0){
          $job = $job->delay($delay);
        }

        if($this->dispatch($job)){
          $counter++;
        }
      }

      $response["success"] = true;
      $response["total_tasks_to_be_schedule"] = ((Int) $total);
      $response["total_tasks_scheduled"] = $counter;
      $response["group_id"] = $group;
      $response["list_jobs_url"] = url("/api/v1/jobs/".$group);

      return Response::json($response);
    }

    public function getJobsByGroup($group)
    {
      $joblog = new JobLog;
      $jobs_executed = $joblog->getByGroup($group);
      $response["total_jobs_processed"] = count($jobs_executed);
      $response['jobs'] = $jobs_executed;

      return $response;
    }

}
