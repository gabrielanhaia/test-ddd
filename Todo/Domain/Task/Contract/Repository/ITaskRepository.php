<?php


namespace Docler\Domain\Task\Contract\Repository;


use Docler\Domain\Task\Contract\Factory\ITaskFactory;
use Docler\Domain\Task\Entity\Task;
use Docler\Domain\Task\Entity\TaskIdentity;

abstract class ITaskRepository
{
    protected $taskFactory;

    public function __construct(ITaskFactory $taskFactory)
    {
        $this->taskFactory = $taskFactory;
    }

    abstract public function updateStatusTask(Task $task): Task;

    abstract public function getTask(TaskIdentity $identity): Task;
}