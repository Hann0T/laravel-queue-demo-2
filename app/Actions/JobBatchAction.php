<?php
namespace App\Actions;

// use Illuminate\Bus\Batch;

use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
// use Illuminate\Support\Facades\Log;

use Throwable;

class JobBatchAction
{
  public static function pushJobsToBatch(
    mixed $jobs,
    bool $cancelOnFailedJob = false
  ) {
    $batch = Bus::batch($jobs)
      ->then(function (Batch $batch) {
        info('Inside batch' . $batch->id . ', successfully completed');
      })
      ->catch(function (Batch $batch, Throwable $exception) use (
        $cancelOnFailedJob
      ) {
        if ($cancelOnFailedJob) {
          $batch->cancel();
        }

        info('Inside batch: ' . $exception->getMessage());
      })
      ->finally(function (Batch $batch) {
        info('Inside batch' . $batch->id . ', finished executing');
      })
      // ->allowFailures()
      ->dispatch();

    return $batch;
  }
}
