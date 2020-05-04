<?php

namespace Docler\Application\Service;

use Docler\Domain\Task\Contract\Repository\ITaskRepository;
use Docler\Domain\Task\Entity\TaskIdentity;

/**
 * Class GetTask
 * @package Docler\Application\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class GetTaskService
{
    /** @var ITaskRepository $taskRepository */
    private $taskRepository;

    public function __construct(ITaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @param int $taskId
     * @return Task
     */
    public function execute(int $taskId): ?Task
    {
        $taskIdentity = new TaskIdentity($taskId);

        $taskEntity = $this->taskRepository->getTask($taskIdentity);

        if (empty($taskEntity)) {
            return null;
        }

        $task = new Task(
            $taskEntity->identity()->getId(),
            $taskEntity->name(),
            $taskEntity->isCompleted()
        );

        return $task;
    }
}