<?php


namespace Docler\Infrastructure\Repository\Eloquent;

use Docler\Domain\Task\Contract\Repository\ITaskRepository;
use Docler\Domain\Task\Entity\Task as TaskEntity;
use Docler\Domain\Task\Entity\TaskIdentity;
use Docler\Domain\Task\Entity\UserIdentity;
use Docler\Infrastructure\Model\Eloquent\TaskEloquentModel;

/**
 * Class EloquentTaskRepository
 * @package Docler\Infrastructure\Repository\Eloquent
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class EloquentTaskRepository extends ITaskRepository
{
    /**
     * Update a status task.
     *
     * @param TaskEntity $task Task to be updated.
     * @return TaskEntity
     */
    public function updateStatusTask(TaskEntity $task): TaskEntity
    {
        TaskEloquentModel::where('id', '=', $task->identity()->getId())
            ->update('is_done', $task->isCompleted());

        return $task;
    }

    /**
     * Find a task by id.
     *
     * @param TaskIdentity $taskIdentity
     * @return TaskEntity
     */
    public function getTask(TaskIdentity $taskIdentity): ?TaskEntity
    {
        $taskEloquentResult = TaskEloquentModel::find($taskIdentity);

        if (empty($taskEloquentResult)) {
            return null;
        }

        $userIdentity = new UserIdentity($taskEloquentResult->user_id);
        $taskResult = $this->taskFactory->build(
            $taskIdentity,
            $userIdentity,
            $taskEloquentResult->title,
            $taskEloquentResult->is_done
        );

        return $taskResult;
    }

    /**
     * Method responsible for creating/updating a task.
     *
     * @param TaskEntity $task
     * @return TaskEntity
     */
    public function storeTask(TaskEntity $task): TaskEntity
    {
        if (empty($task->identity()->getId())) {
            $taskEloquentCreated = TaskEloquentModel::create([
                'title' => $task->name(),
                'user_id' => $task->userIdentity()->getId(),
                'is_done' => $task->isCompleted(),
            ]);

            $taskIdentity = new TaskIdentity($taskEloquentCreated->id);
            $task->setIdentity($taskIdentity);
        } else {
            // TODO: Implement the full update.
        }

        return $task;
    }

    /**
     * Method responsible for deleting a task.
     *
     * @param TaskIdentity $taskIdentity Task identity to be deleted.
     * @return mixed
     */
    public function deleteTask(TaskIdentity $taskIdentity)
    {
        TaskEloquentModel::destroy($taskIdentity->getId());
    }
}