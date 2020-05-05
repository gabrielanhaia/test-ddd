<?php


namespace Docler\Application\Service\Task;

use Docler\Domain\{
    Task\Contract\Repository\ITaskRepository,
    Task\Entity\TaskIdentity,
    Task\Entity\UserIdentity,
    Task\Service\TaskService as DomainTaskService
};

/**
 * Class DeleteTaskService
 * @package Docler\Application\Service\Task
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class DeleteTaskService extends TaskService
{
    public function __construct(
        ITaskRepository $taskRepository,
        DomainTaskService $domainTaskService
    )
    {
        parent::__construct($taskRepository, $domainTaskService);
    }

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

        $this->domainTaskService->deleteTask($authUserIdentity, $taskIdentity);
    }
}