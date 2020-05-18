<?php

namespace DDD\Domain\Task\Contract\Repository;

use DDD\Domain\Task\Contract\Factory\ITaskFactory;
use DDD\Domain\Task\Contract\Factory\IUserFactory;
use DDD\Domain\Task\Entity\User;
use DDD\Domain\Task\Entity\User as UserEntity;
use DDD\Domain\Task\Entity\UserIdentity;

/**
 * Class IUserTaskRepository
 * @package DDD\Domain\Task\Contract\Repository
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