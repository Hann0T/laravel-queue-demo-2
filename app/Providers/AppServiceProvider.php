<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    // Queue::before(function (JobProcessing $event) {
    //   info('before queue');
    //   info($event->job->payload());
    // });

    // Queue::after(function (JobProcessed $event) {
    //   info('after queue');
    //   info($event->job->payload());
    // });

    // Queue::failing(function (JobFailed $event) {
    //   info($event->job->getJobId());
    //   info($event->job->attempts());
    // });
  }
}
