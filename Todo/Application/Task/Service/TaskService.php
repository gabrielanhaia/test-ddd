<?php


namespace Docler\Application\Task\Service;

use Docler\Domain\Task\Contract\Repository\ITaskRepository;

/**
 * Class TaskService
 * @package Docler\Application\Task\Service
 *
 * @author Gabriel Anhaia <annhaia.gabriel@gmail.com>
 */
abstract class TaskService
{
    /** @var ITaskRepository $taskRepository */
    protected $taskRepository;

    /** @var \Docler\Domain\Task\Service\TaskService $domainTaskService */
    protected $domainTaskService;

    /**
     * CreateTaskService constructor.
     *
     * @param ITaskRepository $taskRepository
     * @param \Docler\Domain\Task\Service\TaskService $domainTaskService
     */
    public function __construct(
        ITaskRepository $taskRepository,
        \Docler\Domain\Task\Service\TaskService $domainTaskService
    )
    {
        $this->taskRepository = $taskRepository;
        $this->domainTaskService = $domainTaskService;
    }
}