<?php

namespace App\Listeners;

use Illuminate\Queue\Events\JobFailed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class JobListener
{
  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   *
   * @param  \Illuminate\Queue\Events\JobFailed  $event
   * @return void
   */
  public function handle(JobFailed $event)
  {
    // info('inside the job listener');
    info($event->job->getJobId());
  }
}
