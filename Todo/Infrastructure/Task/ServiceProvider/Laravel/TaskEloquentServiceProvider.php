<?php

namespace Docler\Infrastructure\Task\ServiceProvider\Laravel;

use Illuminate\Support\ServiceProvider;

/**
 * Class TaskEloquentServiceProvider
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TaskEloquentServiceProvider extends ServiceProvider
{
    /** @var string DS */
    const DS = DIRECTORY_SEPARATOR;

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $migrationsPaths = [
            '..' . DS . 'Model' . DS . 'Eloquent' . DS . 'migrations'
        ];

        foreach ($migrationsPaths as $migrationsPath) {
            $this->loadMigrationsFrom($migrationsPath);
        }
    }
}