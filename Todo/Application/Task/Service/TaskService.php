<?php


namespace DDD\Application\Task\Service;

use DDD\Domain\Task\Contract\Repository\ITaskRepository;

/**
 * Class TaskService
 * @package DDD\Application\Task\Service
 *
 * @author Gabriel Anhaia <annhaia.gabriel@gmail.com>
 */
abstract class TaskService
{
    /** @var ITaskRepository $taskRepository */
    protected $taskRepository;

    /** @var \DDD\Domain\Task\Service\TaskService $domainTaskService */
    protected $domainTaskService;

    /**
     * CreateTaskService constructor.
     *
     * @param ITaskRepository $taskRepository
     * @param \DDD\Domain\Task\Service\TaskService $domainTaskService
     */
    public function __construct(
        ITaskRepository $taskRepository,
        \DDD\Domain\Task\Service\TaskService $domainTaskService
    )
    {
        $this->taskRepository = $taskRepository;
        $this->domainTaskService = $domainTaskService;
    }
}