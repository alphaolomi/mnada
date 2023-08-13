<?php

declare(strict_types=1);

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

final class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();

        //   $schedule->command('ban:delete-expired')->everyMinute();

        // $schedule->command(\Spatie\Health\Commands\RunHealthChecksCommand::class)->everyMinute();

        // $schedule->command('model:prune', [
        //     '--model' => [
        //         \Spatie\Health\Models\HealthCheckResultHistoryItem::class,
        //     ],
        // ])->daily();


        // $schedule->command('telescope:prune --hours=48')->daily();

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
