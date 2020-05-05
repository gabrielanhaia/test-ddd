<?php

namespace Docler\Application\Service\Task;

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

        $taskEntity = $this->domainTaskService->getTask($taskIdentity);

        if (empty($taskEntity)) {
            return null;
        }

        $task = new Task(
            $taskEntity->identity()->getId(),
            $taskEntity->isCompleted(),
            $taskEntity->name(),
            $taskEntity->userIdentity()->getId()
        );

        return $task;
    }
}