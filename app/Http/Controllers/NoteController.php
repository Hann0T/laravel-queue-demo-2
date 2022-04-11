<?php

namespace App\Http\Controllers;

use App\Actions\BatchJobAction2;
use App\Actions\JobBatchAction;
use App\Jobs\StoreNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class NoteController extends Controller
{
  public function create()
  {
    $batch = BatchJobAction2::pushJobsToBatch([
      new StoreNote(),
      new StoreNote(),
      new StoreNote(),
      new StoreNote(),
      new StoreNote(),
      new StoreNote(),
    ]);
    return redirect()->route('batch-progress', compact('batch'));
  }

  public function progress(Request $request)
  {
    if ($request->batch['id']) {
      $batch = Bus::findBatch($request->batch['id']);
    }

    return view('batch-progress', compact('batch'));
  }

  public function cancel($id)
  {
    $batch = Bus::findBatch($id);

    $batch->cancel();
    return redirect()->back();
  }
}
