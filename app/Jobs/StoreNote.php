<?php

namespace App\Jobs;

use App\Models\Note;
use Exception;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Throwable;

class StoreNote implements ShouldQueue
{
  use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * The number of times the job may be attempted.
   *
   * @var int
   */
  public $tries = 5;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    if ($this->batch()->cancelled()) {
      return;
    }

    // ignore
    // $randNumber = rand(1, 5);

    // if ($randNumber == 1) {
    //  throw new Exception('An Error occurred, the number is equal to 1');
    // }
    // end-ignore

    sleep(2);

    Note::factory(1)->create();
  }
}
