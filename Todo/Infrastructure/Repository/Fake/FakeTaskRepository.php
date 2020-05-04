<?php


namespace Docler\Infrastructure\Repository\Fake;


use Docler\Domain\Task\Contract\Repository\ITaskRepository;
use Docler\Domain\Task\Entity\Task;
use Docler\Domain\Task\Entity\TaskIdentity;
use Docler\Domain\Task\Entity\UserIdentity;

/**
 * Class FakeTaskRepository
 * @package Docler\Infrastructure\Repository
 */
class FakeTaskRepository extends ITaskRepository
{
    public function updateStatusTask(Task $task): Task
    {
        // TODO: Implement updateStatusTask() method.
    }

    /**
     * @param TaskIdentity $identity
     * @return Task
     */
    public function getTask(TaskIdentity $identity): Task
    {
        // Simulação
        $taskDatabase = [
            'id' => 323132,
            'name' => 424342,
            'user_id',
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
}