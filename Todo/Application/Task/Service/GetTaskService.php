<?php

namespace Docler\Application\Task\Service;

use Docler\Domain\Task\Entity\TaskIdentity;

/**
 * Class GetTask
 * @package Docler\Application\Task\Service
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