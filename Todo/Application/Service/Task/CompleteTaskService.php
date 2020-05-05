<?php


namespace Docler\Application\Service\Task;

use Docler\Domain\Task\Entity\TaskIdentity;
use Docler\Application\Service\Task\TaskService as ApplicationTaskService;

/**
 * Class CompleteTask
 * @package Docler\Application\Service\Task
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
            $taskEntity->name()
        );

        return $taskResponse;
    }
}