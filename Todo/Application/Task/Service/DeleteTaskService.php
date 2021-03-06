<?php


namespace DDD\Application\Task\Service;

use DDD\Domain\{
    Task\Entity\TaskIdentity,
    Task\Entity\UserIdentity,
};

/**
 * Class DeleteTaskService
 * @package DDD\Application\Task\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class DeleteTaskService extends TaskService
{
    /**
     * Delete a task.
     *
     * @param int $taskId Task identity to be deleted.
     * @param int $currentUserId Current user id performing the action.
     *
     * @throws \Exception
     */
    public function execute(int $taskId, int $currentUserId): void
    {
        $authUserIdentity = new UserIdentity($currentUserId);

        $taskIdentity = new TaskIdentity($taskId);

        $this->domainTaskService->deleteTask($authUserIdentity, $taskIdentity);
    }
}