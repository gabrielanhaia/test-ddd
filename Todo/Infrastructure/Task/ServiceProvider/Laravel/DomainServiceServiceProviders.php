<?php


namespace DDD\Infrastructure\Task\ServiceProvider\Laravel;

use DDD\Domain\Task\Service\TaskService;
use Illuminate\Support\ServiceProvider;

class DomainServiceServiceProviders extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        TaskService::class => TaskService::class
    ];

    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
    ];
}
