<?php


namespace Docler\Infrastructure\Task\Repository\Fake;

use Docler\Domain\Task\Contract\Repository\ITaskRepository;
use Docler\Domain\Task\Entity\Task;
use Docler\Domain\Task\Entity\TaskIdentity;
use Docler\Domain\Task\Entity\UserIdentity;

/**
 * Class FakeTaskRepository
 * @package Docler\Infrastructure\Task\Repository
 */
class FakeTaskRepository extends ITaskRepository
{
    /**
     * Update a task status.
     *
     * @param Task $task
     * @return Task
     */
    public function updateStatusTask(Task $task): Task
    {
        // TODO: Update task right here.

        return $task;
    }

    /**
     * @param TaskIdentity $identity
     * @return Task
     */
    public function getTask(TaskIdentity $identity): ?Task
    {
        // Simulação
        $taskDatabase = [
            'id' => 323132,
            'name' => 424342,
            'user_id' => 11111,
            'is_completed' => true
        ];

        $taskIdentity = new TaskIdentity($taskDatabase['id']);
        $userIdentity = new UserIdentity($taskDatabase['user_id']);

        $task = $this->taskFactory->build(
            $taskIdentity,
            $userIdentity,
            $taskDatabase['name'],
            $taskDatabase['is_completed']
        );

        return $task;
    }

    /**
     * Method responsible for creating/updating a task.
     *
     * @param Task $task
     * @return Task
     */
    public function storeTask(Task $task): Task
    {
        // Task Stored

        if (!empty($task->identity()->getId())) {
            // Updaste
        } else {
            $taskIdentity = new TaskIdentity(2132323);
            $task->setIdentity($taskIdentity);
        }

        return $task;
    }

    /**
     * Method responsible for deleting a task.
     *
     * @param TaskIdentity $taskIdentity Task identity to be deleted.
     * @return mixed
     */
    public function deleteTask(TaskIdentity $taskIdentity): bool
    {
        // TODO: Delete task.

        return true;
    }
}