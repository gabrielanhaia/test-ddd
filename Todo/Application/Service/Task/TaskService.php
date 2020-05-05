<?php


namespace Docler\Application\Service\Task;

use Docler\Domain\Task\Contract\Repository\ITaskRepository;

/**
 * Class TaskService
 * @package Docler\Application\Service\Task
 *
 * @author Gabriel Anhaia <annhaia.gabriel@gmail.com>
 */
abstract class TaskService
{
    /**
     * @var ITaskRepository
     */
    protected $taskRepository;

    /**
     * @var \Docler\Domain\Task\Service\TaskService
     */
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