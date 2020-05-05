<?php


namespace Docler\Domain\Task\Service;

use Docler\Domain\{
    Task\Contract\Repository\ITaskRepository,
    Task\Entity\Task as TaskEntity,
    Task\Entity\TaskIdentity,
    Task\Entity\UserIdentity,
    Task\Validator\TaskValidator
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
     * @var TaskValidator
     */
    private $taskValidator;

    /**
     * TaskService constructor.
     * @param ITaskRepository $taskRepository
     * @param TaskValidator $taskValidator
     */
    public function __construct(
        ITaskRepository $taskRepository,
        TaskValidator $taskValidator
    )
    {
        $this->taskRepository = $taskRepository;
        $this->taskValidator = $taskValidator;
    }

    /**
     * Complete a task.
     *
     * @param TaskIdentity $taskIdentity
     * @return TaskEntity
     * @throws \Exception
     */
    public function completeTask(TaskIdentity $taskIdentity): TaskEntity
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
     * @return TaskEntity
     * @throws \Exception
     */
    public function incompleteTask(TaskIdentity $taskIdentity): TaskEntity
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

    /**
     * Create a new task.
     *
     * @param TaskEntity $taskEntity Task entity to be created.
     * @return TaskEntity
     * @throws \Docler\Domain\Core\Exception\ValidatorException
     */
    public function createTask(TaskEntity $taskEntity): TaskEntity
    {
        $this->taskValidator->validateCreateTask($taskEntity);

        $taskEntity = $this->taskRepository->storeTask($taskEntity);

        return $taskEntity;
    }

    /**
     * Get a task.
     *
     * @param TaskIdentity $taskIdentity
     * @return TaskEntity|null
     * @throws \Exception
     */
    public function getTask(TaskIdentity $taskIdentity): TaskEntity
    {
        $task = $this->taskRepository->getTask($taskIdentity);

        if (empty($taskEntity)) {
            throw new \Exception('Task not found.');
        }

        return $task;
    }
}