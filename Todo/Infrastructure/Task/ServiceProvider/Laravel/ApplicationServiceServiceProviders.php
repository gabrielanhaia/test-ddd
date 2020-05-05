<?php


namespace Docler\Infrastructure\Task\ServiceProvider\Laravel;

use Docler\Application\Task\Service\{
    CompleteTaskService,
    CreateTaskService,
    DeleteTaskService,
    GetTaskService,
    IncompleteTaskService
};
use Illuminate\Support\ServiceProvider;

/**
 * Class ApplicationServiceServiceProviders
 * @package App\Providers\DDD
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ApplicationServiceServiceProviders extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        CompleteTaskService::class => CompleteTaskService::class,
        CreateTaskService::class => CreateTaskService::class,
        DeleteTaskService::class => DeleteTaskService::class,
        GetTaskService::class => GetTaskService::class,
        IncompleteTaskService::class => IncompleteTaskService::class,
    ];
}
