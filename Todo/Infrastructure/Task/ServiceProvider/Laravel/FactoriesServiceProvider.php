<?php

namespace DDD\Infrastructure\Task\ServiceProvider\Laravel;

use DDD\Domain\Task\Contract\Factory\ITaskFactory;
use DDD\Domain\Task\Contract\Factory\IUserFactory;
use DDD\Domain\Task\Factory\TaskFactory;
use DDD\Domain\Task\Factory\UserFactory;
use Illuminate\Support\ServiceProvider;

class FactoriesServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        ITaskFactory::class => TaskFactory::class,
        IUserFactory::class => UserFactory::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
