<?php


namespace Docler\Domain\Task\Factory;

use Docler\Domain\Task\Contract\Factory\ITaskFactory;
use Docler\Domain\Task\Entity\Task;
use Docler\Domain\Task\Entity\TaskIdentity;
use Docler\Domain\Task\Entity\UserIdentity;

/**
 * Class TaskFactory
 * @package Docler\Domain\Task\Factory
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