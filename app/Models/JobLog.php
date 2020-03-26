<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobLog extends Model
{
  protected $table = "job_logs";
  protected $fillable = ["job_id", "group_id", "user_id", "queue", "payload", "attempts", "start_execution_datetime", "end_execution_datetime"];

  public function getByGroup($group_id)
  {
    $jobs = self::where('group_id', $group_id)->get();

    return $jobs;
  }

}
