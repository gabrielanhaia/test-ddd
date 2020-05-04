<?php


namespace Docler\Domain\Task\Contract\Repository;


use Docler\Domain\Task\Contract\Factory\ITaskFactory;
use Docler\Domain\Task\Contract\Factory\IUserFactory;
use Docler\Domain\Task\Entity\User;
use Docler\Domain\Task\Entity\UserIdentity;

abstract class IUserRepository
{
    protected $userFactory;

    protected $taskFactory;

    public function __construct(IUserFactory $userFactory, ITaskFactory $taskFactory)
    {
        $this->userFactory = $userFactory;
        $this->taskFactory = $taskFactory;
    }

    abstract public function getListOfTasks(UserIdentity $userIdentity): User;
}