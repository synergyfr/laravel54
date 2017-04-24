<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        
        //'App\Console\Commands\Inspire'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        // * * * *
        
        // execute artisan command - php artisan command inspire
        // $schedule->command('inspire')->hourly();

        // execute command
        // $schedule->exec("touch foo.txt")->everyFiveMinutes();

        // for email, need to save first
        //$schedule->command('laracasts:clear-history')->monthly()->sendOutputTo('path/to/file')->emailOutputTo('');
        //$schedule->command('laracasts:daily-report')->dailyAt('23:55');

        // ->thenPing() ping a URL
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
