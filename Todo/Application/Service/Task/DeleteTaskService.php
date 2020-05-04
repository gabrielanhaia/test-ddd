<?php


namespace Docler\Application\Service\Task;

use Docler\Domain\Task\Entity\TaskIdentity;
use Docler\Domain\Task\Entity\UserIdentity;

/**
 * Class DeleteTaskService
 * @package Docler\Application\Service\Task
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class DeleteTaskService extends TaskService
{
    /**
     * Delete a task.
     *
     * @param int $taskId Task identity to be deleted.
     * @throws \Exception
     */
    public function execute(int $taskId): void
    {
        $authUserIdentity = new UserIdentity(11111);

        $taskIdentity = new TaskIdentity($taskId);

        $task = $this->taskRepository->getTask($taskIdentity);

        if (empty($task) || !($task->userIdentity()->equal($authUserIdentity))) {
            throw new \Exception('Task not found.');
        }

        $this->taskRepository->deleteTask($taskIdentity);
    }
}