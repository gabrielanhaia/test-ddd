<?php


namespace DDD\Domain\Task\Contract\Repository;

use DDD\Domain\{Task\Contract\Factory\ITaskFactory, Task\Entity\Task as TaskEntity, Task\Entity\TaskIdentity};

/**
 * Class ITaskRepository
 * @package DDD\Domain\Task\Contract\Repository
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
abstract class ITaskRepository
{
    /** @var ITaskFactory $taskFactory */
    protected $taskFactory;

    /**
     * ITaskRepository constructor.
     * @param ITaskFactory $taskFactory
     */
    public function __construct(ITaskFactory $taskFactory)
    {
        $this->taskFactory = $taskFactory;
    }

    /**
     * Update a status task.
     *
     * @param TaskEntity $task Task to be updated.
     * @return TaskEntity
     */
    abstract public function updateStatusTask(TaskEntity $task): TaskEntity;

    /**
     * Find a task by id.
     *
     * @param TaskIdentity $taskIdentity
     * @return TaskEntity
     */
    abstract public function getTask(TaskIdentity $taskIdentity): ?TaskEntity;

    /**
     * Method responsible for creating/updating a task.
     *
     * @param TaskEntity $taskToBeStored
     * @return TaskEntity
     */
    abstract public function storeTask(TaskEntity $taskToBeStored): TaskEntity;

    /**
     * Method responsible for deleting a task.
     *
     * @param TaskIdentity $taskIdentity Task identity to be deleted.
     * @return mixed
     */
    abstract public function deleteTask(TaskIdentity $taskIdentity);
}