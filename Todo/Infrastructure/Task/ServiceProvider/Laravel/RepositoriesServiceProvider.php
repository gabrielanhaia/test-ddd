<?php

namespace Docler\Infrastructure\Task\ServiceProvider\Laravel;

use Docler\Domain\Task\Contract\Repository\ITaskRepository;
use Docler\Domain\Task\Contract\Repository\IUserRepository;
use Docler\Domain\Task\Contract\Repository\IUserTaskRepository;
use Docler\Infrastructure\Task\Repository\Eloquent\EloquentTaskRepository;
use Docler\Infrastructure\Task\Repository\Fake\FakeTaskRepository;
use Docler\Infrastructure\Task\Repository\Fake\FakeUserRepository;
use Docler\Infrastructure\Task\Repository\Fake\FakeUserTaskRepository;
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
