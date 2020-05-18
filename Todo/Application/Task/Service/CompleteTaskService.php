<?php


namespace DDD\Application\Task\Service;

use DDD\Domain\Task\Entity\TaskIdentity;
use DDD\Application\Task\Service\TaskService as ApplicationTaskService;

/**
 * Class CompleteTask
 * @package DDD\Application\Task\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CompleteTaskService extends ApplicationTaskService
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

        $taskEntity = $this->domainTaskService->completeTask($taskIdentity);

        $taskResponse = new Task(
            $taskEntity->identity()->getId(),
            $taskEntity->isCompleted(),
            $taskEntity->name(),
            $taskEntity->userIdentity()->getId()
        );

        return $taskResponse;
    }
}