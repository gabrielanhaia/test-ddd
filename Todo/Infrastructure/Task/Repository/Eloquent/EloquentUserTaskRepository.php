<?php

namespace Docler\Infrastructure\Task\Repository\Eloquent;

use Docler\Domain\Task\Contract\Factory\ITaskFactory;
use Docler\Domain\Task\Contract\Factory\IUserFactory;
use Docler\Domain\Task\Contract\Repository\IUserTaskRepository;
use Docler\Infrastructure\Task\Persistence\Task\UserEloquentModel;
use Docler\Domain\Task\Entity\{TaskIdentity, User};

/**
 * Class EloquentUserTaskRepository
 * @package Docler\Infrastructure\Task\Repository\Eloquent
 *
 * @author Gabriel Annhaia <anhaia.gabriel@gmail.com>
 */
class EloquentUserTaskRepository extends IUserTaskRepository
{
    /**
     * @var UserEloquentModel
     */
    private $userEloquentModel;

    /**
     * EloquentUserTaskRepository constructor.
     * @param IUserFactory $userFactory
     * @param ITaskFactory $taskFactory
     * @param UserEloquentModel $userEloquentModel
     */
    public function __construct(
        IUserFactory $userFactory,
        ITaskFactory $taskFactory,
        UserEloquentModel $userEloquentModel
    )
    {
        parent::__construct($userFactory, $taskFactory);
        $this->userEloquentModel = $userEloquentModel;
    }

    /**
     * Return all user tasks.
     */
    public function getTasks(): User
    {
        $userTasksEloquentResult = $this->userEloquentModel::where('id', '=', $this->userIdentity->getId())
            ->with('tasks')
            ->get();

        $userEntity = $this->userFactory->build(
            $this->userIdentity,
            $userTasksEloquentResult->name
        );

        foreach ($userTasksEloquentResult->tasks as $task) {
            $taskEntity = $this->taskFactory->build(
                (new TaskIdentity($task->id)),
                $task->userIdentity,
                $task->name,
                $task->is_completed
            );

            $userEntity->addTask($taskEntity);
        }

        return $userEntity;
    }
}