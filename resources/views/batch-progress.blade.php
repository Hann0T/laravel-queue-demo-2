<style>
    .alert {
        color: red;
    }

    .alert-2 {
        color: orangered;
    }

    .success {
        color: green;
    }

    .button {
        color: white;
        background-color: red;
        border-radius: 5px;
        padding: .5em 1em;
    }
</style>

<a href="cancel/{{$batch->id}}" class="button">cancel: {{ $batch->id }}</a>
<p>total jobs: {{ $batch->totalJobs }}</p>
<p>pending: {{ $batch->pendingJobs }}</p>
<h2>status: {{ $batch->progress() }}%</h2>

<h3>jobs processed: {{ $batch->processedJobs() }}</h3>

@if($batch->failedJobs)
<p class="alert">An error occurred</p>
<p class="alert-2">jobs failed: {{ $batch->failedJobs }}</p>
@endif

@if($batch->cancelled())
<p class="alert">job batch was cancelled</p>
@endif

@if($batch->finished())
<p class="success">job batch finished executing</p>
@endif

@if(!is_null($batch) && $batch->progress() < 100 && !$batch->cancelled())
    <script>
        window.setInterval(() => {
            window.location.reload();
        }, 2000);
    </script>
    @endif
