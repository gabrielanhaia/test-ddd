<?php

namespace Docler\Application\Service\Task;

use Docler\Domain\Task\Contract\Repository\ITaskRepository;
use Docler\Domain\Task\Entity\TaskIdentity;

/**
 * Class GetTask
 * @package Docler\Application\Service\Task
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class GetTaskService extends TaskService
{
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