<?php


namespace Docler\Infrastructure\Repository\Eloquent;

use Docler\Domain\Task\Contract\Repository\IUserTaskRepository;
use Docler\Domain\Task\Entity\{TaskIdentity, User};

/**
 * Class EloquentUserTaskRepository
 * @package Docler\Infrastructure\Repository\Eloquent
 *
 * @author Gabriel Annhaia <anhaia.gabriel@gmail.com>
 */
class EloquentUserTaskRepository extends IUserTaskRepository
{
    /**
     * Return all user tasks.
     */
    public function getTasks(): User
    {
        $userTasksEloquentResult = User::where('id', '=', $this->userIdentity->getId())
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