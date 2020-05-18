<?php


namespace DDD\Domain\Task\Factory;

use DDD\Domain\Task\Contract\Factory\ITaskFactory;
use DDD\Domain\Task\Entity\Task;
use DDD\Domain\Task\Entity\TaskIdentity;
use DDD\Domain\Task\Entity\UserIdentity;

/**
 * Class TaskFactory
 * @package DDD\Domain\Task\Factory
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TaskFactory implements ITaskFactory
{
    /**
     * @param TaskIdentity $taskIdentity
     * @param UserIdentity $userIdentity
     * @param string $name
     * @param bool $isCompleted
     * @return Task
     */
    public function build(
        TaskIdentity $taskIdentity,
        UserIdentity $userIdentity,
        string $name,
        bool $isCompleted
    ): Task
    {
        $taskEntity = new Task($taskIdentity, $userIdentity, $name, $isCompleted);

        return $taskEntity;
    }
}