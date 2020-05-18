<?php

namespace DDD\Application\Task\Service;

use DDD\Domain\Task\Entity\TaskIdentity;

/**
 * Class GetTask
 * @package DDD\Application\Task\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class GetTaskService extends TaskService
{
    /**
     * Get a task.
     *
     * @param int $taskId
     * @return Task
     * @throws \Exception
     */
    public function execute(int $taskId): ?Task
    {
        $taskIdentity = new TaskIdentity($taskId);

        $taskEntity = $this->domainTaskService->getTask($taskIdentity);

        $task = new Task(
            $taskEntity->identity()->getId(),
            $taskEntity->isCompleted(),
            $taskEntity->name(),
            $taskEntity->userIdentity()->getId()
        );

        return $task;
    }
}