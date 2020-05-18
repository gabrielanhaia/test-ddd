<?php

namespace DDD\Infrastructure\Task\ServiceProvider\Laravel;

use DDD\Domain\Task\Contract\Repository\ITaskRepository;
use DDD\Domain\Task\Contract\Repository\IUserRepository;
use DDD\Domain\Task\Contract\Repository\IUserTaskRepository;
use DDD\Infrastructure\Task\Repository\Eloquent\EloquentTaskRepository;
use DDD\Infrastructure\Task\Repository\Fake\FakeTaskRepository;
use DDD\Infrastructure\Task\Repository\Fake\FakeUserRepository;
use DDD\Infrastructure\Task\Repository\Fake\FakeUserTaskRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        ITaskRepository::class => EloquentTaskRepository::class,
        IUserRepository::class => FakeUserRepository::class,
        IUserTaskRepository::class => FakeUserTaskRepository::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
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
