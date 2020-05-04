<?php


namespace Docler\Domain\Task\Contract\Repository;

use Docler\Domain\Task\Contract\Factory\ITaskFactory;
use Docler\Domain\Task\Contract\Factory\IUserFactory;
use Docler\Domain\Task\Entity\User;
use Docler\Domain\Task\Entity\UserIdentity;

/**
 * Class IUserRepository
 * @package Docler\Domain\Task\Contract\Repository
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
abstract class IUserRepository
{
    /** @var IUserFactory $userFactory Factory of user entities. */
    protected $userFactory;

    /** @var ITaskFactory $taskFactory Factory of tasks. */
    protected $taskFactory;

    /**
     * IUserRepository constructor.
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
     * Get a list of tasks related to a user.
     *
     * @param UserIdentity $userIdentity
     * @return User
     */
    abstract public function getListOfTasks(UserIdentity $userIdentity): User;
}