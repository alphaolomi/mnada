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
    protected $signature = 'dev:list-throwable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all throwable classes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $throwableClasses = collect(get_declared_classes())
            ->filter(static function (string $class) {
                return is_subclass_of($class, \Throwable::class);
            })
            ->sort()
            ->toArray();

        $this->info('Found ' . count($throwableClasses) . ' throwable classes');

        $this->table(['Throwable classes'], array_map(static function (string $class) {
            return [$class];
        }, $throwableClasses));

        return Command::SUCCESS;
    }
}
