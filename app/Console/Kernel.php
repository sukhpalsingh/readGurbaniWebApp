<?php

namespace App\Console;

use App\Services\IpGeocodeService;
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
        Commands\GetVideos::class,
        Commands\GetGurbani::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('videos:get')->everyMinute();

        $schedule->call(function() {
            (new IpGeocodeService())->geocodeIps();
        })->everyMinute();

        $schedule->call(function() {
            (new App\Services\TagVideoService())->tagVideos();
        })->everyMinute();

        // $schedule->command('inspire')
        //          ->everyMinute();
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
