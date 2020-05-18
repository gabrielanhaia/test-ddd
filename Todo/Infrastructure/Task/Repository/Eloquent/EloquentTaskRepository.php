<?php


namespace DDD\Infrastructure\Task\Repository\Eloquent;

use DDD\Domain\Task\Contract\Factory\ITaskFactory;
use DDD\Domain\Task\Contract\Repository\ITaskRepository;
use DDD\Domain\Task\Entity\{Task as TaskEntity, TaskIdentity, UserIdentity};
use DDD\Infrastructure\Task\Model\Eloquent\TaskEloquentModel;

/**
 * Class EloquentTaskRepository
 * @package DDD\Infrastructure\Task\Repository\Eloquent
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class EloquentTaskRepository extends ITaskRepository
{
    /**
     * @var TaskEloquentModel
     */
    private $taskEloquentModel;

    /**
     * EloquentTaskRepository constructor.
     * @param ITaskFactory $taskFactory
     * @param TaskEloquentModel $taskEloquentModel
     */
    public function __construct(ITaskFactory $taskFactory, TaskEloquentModel $taskEloquentModel)
    {
        parent::__construct($taskFactory);
        $this->taskEloquentModel = $taskEloquentModel;
    }

    /**
     * Update a status task.
     *
     * @param TaskEntity $task Task to be updated.
     * @return TaskEntity
     */
    public function updateStatusTask(TaskEntity $task): TaskEntity
    {
        $this->taskEloquentModel::where('id', '=', $task->identity()->getId())
            ->update(['is_done' => $task->isCompleted()]);

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
        $taskEloquentResult = $this->taskEloquentModel::find($taskIdentity);

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
            $taskEloquentCreated = $this->taskEloquentModel::create([
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
        $this->taskEloquentModel::destroy($taskIdentity->getId());
    }
}