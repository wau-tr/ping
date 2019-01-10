<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class QueueProjects implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $projects;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Collection $projects)
    {
        $this->projects = $projects;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->projects as $key => $project) {
            PingProject::dispatch($project)->onQueue('ping');   
        }
    }
}
