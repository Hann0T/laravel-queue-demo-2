<?php
namespace App\Actions;

use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;

// use Throwable;

class BatchJobAction2
{
  public static function pushJobsToBatch(mixed $jobs)
  {
    $batch = Bus::batch([])
      ->finally(function (Batch $batch) {
        if ($batch->cancelled()) {
          info("{$batch->id}: The batch was cancelled");
        }
        if ($batch->failedJobs > 0) {
          info($batch->failedJobIds);
        }
      })
      ->allowFailures(false)
      ->dispatch();

    DB::transaction(function () use ($jobs, $batch) {
      foreach ($jobs as $job) {
        $batch->add($job);
      }
    });

    return $batch;
  }
}
