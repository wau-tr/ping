<?php

namespace App\Jobs;

use App\Project;
use App\Services\PingService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PingProject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $project;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PingService $ping)
    {
        if ($this->project->id == 1) {
            dd($this->project); 
        }
        // dd($this->project->checks->last());
        $this->project->checks()
            ->create(['code' => $ping->check($this->project->url)]);
    }
}
