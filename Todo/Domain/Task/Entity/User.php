<?php


namespace DDD\Domain\Task\Entity;

use DDD\Domain\Core\Entity\IPrintable;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class User
 * @package DDD\Domain\Task\Entity
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class User implements IPrintable
{
    /** @var string $name */
    protected $name;

    /** @var UserIdentity $identity */
    protected $identity;

    /** @var ArrayCollection|Task[] $tasks */
    protected $tasks;

    /**
     * Task constructor.
     * @param UserIdentity $identity
     */
    public function __construct(UserIdentity $identity)
    {
        $this->identity = $identity;
        $this->tasks = new ArrayCollection;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return string
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function tasks(): ArrayCollection
    {
        return $this->tasks;
    }

    public function addTask(Task $task)
    {
        $this->tasks->add($task);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        // TODO: Implement __toString() method.
    }
}