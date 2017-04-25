<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Jobs\DoSomethingElse;

// use Illuminate\Foundation\Bus\DispatchesJobs;

class CompileReports
{
    use Dispatchable, Queueable;

    protected $reportId;

    protected $type;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($reportId, $type) // $reportId
    {
        $this->reportId = $reportId;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // dependencies and stuff
        // var_dump('Compiling the ' . $this->type . ' report with the id ' . $this->reportId . ' within the Job class.');

        var_dump( sprintf('Compiling the %s report with the id %s within the Job class', $this->type, $this->reportId) );

        if (true) {
            //$this->dispatch(new DoSomethingElse() );
            dispatch(new DoSomethingElse());
        }

        // trigger job/task or event if you want
        // fire event if you want to listen to it

        // event(new ReportWasCompiled);

    }
}
