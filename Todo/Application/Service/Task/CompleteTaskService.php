<?php


namespace Docler\Application\Service\Task;

use Docler\Domain\Task\Entity\TaskIdentity;

/**
 * Class CompleteTask
 * @package Docler\Application\Service\Task
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CompleteTaskService extends TaskService
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

        $taskEntity = $this->taskRepository->getTask($taskIdentity);

        if (empty($taskEntity)) {
            throw new \Exception('Task not found.');
        }

        $taskEntity->complete();

        $taskEntity = $this->taskRepository->updateStatusTask($taskEntity);

        $taskResponse = new Task(
            $taskEntity->identity()->getId(),
            $taskEntity->isCompleted(),
            $taskEntity->name()
        );

        return $taskResponse;
    }
}