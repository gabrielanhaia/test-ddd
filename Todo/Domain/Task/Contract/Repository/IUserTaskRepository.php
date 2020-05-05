<?php

namespace Docler\Domain\Task\Contract\Repository;

use Docler\Domain\Task\Contract\Factory\ITaskFactory;
use Docler\Domain\Task\Contract\Factory\IUserFactory;
use Docler\Domain\Task\Entity\User;
use Docler\Domain\Task\Entity\User as UserEntity;
use Docler\Domain\Task\Entity\UserIdentity;

/**
 * Class IUserTaskRepository
 * @package Docler\Domain\Task\Contract\Repository
 */
abstract class IUserTaskRepository
{
    /** @var IUserFactory $userFactory User factory. */
    protected $userFactory;

    /** @var ITaskFactory $taskFactory Task entity factory. */
    protected $taskFactory;

    /** @var UserIdentity $userIdentity User identity. */
    protected $userIdentity;

    /**
     * IUserTaskRepository constructor.
     *
     * @param IUserFactory $userFactory
     * @param ITaskFactory $taskFactory
     */
    public function __construct(IUserFactory $userFactory, ITaskFactory $taskFactory)
    {
        $this->userFactory = $userFactory;
        $this->taskFactory = $taskFactory;
    }

    /**
     * @param UserIdentity $userIdentity
     */
    public function setUser(UserIdentity $userIdentity)
    {
        $this->userIdentity = $userIdentity;
    }

    /**
     * Return all user tasks.
     */
    abstract public function getTasks(): User;
}