<?php

declare(strict_types=1);

namespace App\Console\Commands\Dev;

use Illuminate\Console\Command;

final class ListThrowableClassesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dev:list-throwable-classes-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        (new \App\Support\ListThrowableClasses());

        return Command::SUCCESS;
    }
}
