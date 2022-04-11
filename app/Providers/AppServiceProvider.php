<?php

namespace App\Providers;

// use Illuminate\Queue\Events\JobProcessed;
// use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Queue;
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

    // Queue::looping(function () {
    //   info('first transaction level: ' . DB::transactionLevel());
    //   while (DB::transactionLevel() > 0) {
    //     info('transaction level: ' . DB::transactionLevel());
    //     DB::rollBack();
    //   }
    // });

    // Queue::after(function (JobProcessed $event) {
    //   info('after queue');
    //   info($event->job->payload());
    // });
  }
}
