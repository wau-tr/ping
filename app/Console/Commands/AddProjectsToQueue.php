<?php

namespace Console\Commands;

use App\Jobs\QueueProjects;
use App\Project;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class AddProjectsToQueue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'projects:addQueue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds jobs to queue';

    private $chunkLimit = 100;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Project::whereHas('checks', function ($query) {
            $query->where('created_at', '<', Carbon::now());
        })
        ->chunk($this->chunkLimit, function ($projects) {
            QueueProjects::dispatch($projects)->onQueue('projects');
        });
    }
}
