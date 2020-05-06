<?php


namespace Docler\Application\Task\Service;

use Docler\Domain\Task\Entity\TaskIdentity;

/**
 * Class IncompleteTaskService
 * @package Docler\Application\Task\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class IncompleteTaskService extends TaskService
{
    /**
     * Execute de complete task service.
     *
     * @param int $taskId
     * @return Task
     *
     * @throws \Exception
     */
    public function execute(int $taskId): Task
    {
        $taskIdentity = new TaskIdentity($taskId);

       $taskEntity = $this->domainTaskService->incompleteTask($taskIdentity);

        $taskResponse = new Task(
            $taskEntity->identity()->getId(),
            $taskEntity->isCompleted(),
            $taskEntity->name(),
            $taskEntity->userIdentity()->getId()
        );

        return $taskResponse;
    }
}