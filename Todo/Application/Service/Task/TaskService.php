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
     * CreateTaskService constructor.
     * @param ITaskRepository $taskRepository
     */
    public function __construct(ITaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
}