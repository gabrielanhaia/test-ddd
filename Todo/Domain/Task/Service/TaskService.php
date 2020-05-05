<?php


namespace Docler\Domain\Task\Service;

use Docler\Domain\{
    Task\Contract\Repository\ITaskRepository,
    Task\Entity\Task,
    Task\Entity\TaskIdentity,
    Task\Entity\UserIdentity
};

/**
 * This is the task service in the "Domain layer".
 * @package Docler\Task\Service
 *
 * @author Gabriel Annhaia <anhaia.gabriel@gmail.com>
 */
class TaskService
{
    /**
     * @var ITaskRepository
     */
    private $taskRepository;

    /**
     * TaskService constructor.
     * @param ITaskRepository $taskRepository
     */
    public function __construct(ITaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Complete a task.
     *
     * @param TaskIdentity $taskIdentity
     * @return Task
     * @throws \Exception
     */
    public function completeTask(TaskIdentity $taskIdentity): Task
    {
        $taskEntity = $this->taskRepository->getTask($taskIdentity);

        if (empty($taskEntity)) {
            throw new \Exception('Task not found.');
        }

        $taskEntity->complete();

        $taskEntity = $this->taskRepository->updateStatusTask($taskEntity);

        return $taskEntity;
    }

    /**
     * Incomplete a task.
     *
     * @param TaskIdentity $taskIdentity
     * @return Task
     * @throws \Exception
     */
    public function incompleteTask(TaskIdentity $taskIdentity): Task
    {
        $taskEntity = $this->taskRepository->getTask($taskIdentity);

        if (empty($taskEntity)) {
            throw new \Exception('Task not found.');
        }

        $taskEntity->incomplete();

        $taskEntity = $this->taskRepository->updateStatusTask($taskEntity);

        return $taskEntity;
    }

    /**
     * Delete a task.
     *
     * @param UserIdentity $authUserIdentity
     * @param TaskIdentity $taskIdentity
     * @throws \Exception
     */
    public function deleteTask(
        UserIdentity $authUserIdentity,
        TaskIdentity $taskIdentity
    )
    {
        $task = $this->taskRepository->getTask($taskIdentity);

        if (empty($task) || !($task->userIdentity()->equal($authUserIdentity))) {
            throw new \Exception('Task not found.');
        }

        $this->taskRepository->deleteTask($taskIdentity);
    }
}