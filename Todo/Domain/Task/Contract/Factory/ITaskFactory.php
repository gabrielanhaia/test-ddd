<?php


namespace DDD\Domain\Task\Contract\Factory;

use DDD\Domain\Task\Entity\{Task, TaskIdentity, UserIdentity};

/**
 * Interface UserFactory
 * @package DDD\Domain\Task\Contract\Factory
 */
interface ITaskFactory
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
    ): Task;
}