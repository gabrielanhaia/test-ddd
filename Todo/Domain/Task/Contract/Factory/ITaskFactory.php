<?php


namespace Docler\Domain\Task\Contract\Factory;

use Docler\Domain\Task\Entity\{Task, TaskIdentity, UserIdentity};

/**
 * Interface UserFactory
 * @package Docler\Domain\Task\Contract\Factory
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