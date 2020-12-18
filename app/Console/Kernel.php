<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Jobs\SendNotification;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Schedule::class,

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $update = $schedule->command('minute:update')->cron('20 6 10 * * *');
        $schedule->job(new SendNotification())->everyMinute();
        $schedule->call('App\Http\Controllers\PostController@sendNotification')->everyMinute();
    }
}
