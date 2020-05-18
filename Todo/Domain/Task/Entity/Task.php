<?php

namespace DDD\Domain\Task\Entity;

use DDD\Domain\Core\Entity\IPrintable;

/**
 * Class Task
 * @package DDD\Domain\Task
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class Task implements IPrintable
{
    /** @var string $name */
    private $name;

    /** @var bool $isCompleted */
    private $isCompleted;

    /** @var TaskIdentity $identity */
    private $identity;

    /** @var UserIdentity $userIdentity */
    private $userIdentity;

    /**
     * Task constructor.
     * @param TaskIdentity $identity
     * @param UserIdentity $userIdentity
     * @param string $name
     * @param bool $isCompleted
     */
    public function __construct(
        TaskIdentity $identity,
        UserIdentity $userIdentity,
        string $name = null,
        bool $isCompleted = null
    )
    {
        $this->identity = $identity;
        $this->userIdentity = $userIdentity;
        $this->isCompleted = $isCompleted;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function name(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Task
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCompleted(): ?bool
    {
        return $this->isCompleted;
    }

    /**
     * @return TaskIdentity|null
     */
    public function identity(): ?TaskIdentity
    {
        return $this->identity;
    }

    /**
     * @return UserIdentity
     */
    public function userIdentity(): UserIdentity
    {
        return $this->userIdentity;
    }

    /**
     * Complete a task.
     */
    public function complete()
    {
        $this->isCompleted = true;
    }

    /**
     * Complete a task.
     */
    public function incomplete()
    {
        $this->isCompleted = false;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->identity()->getId();
    }

    /**
     * @param TaskIdentity $taskIdentity
     * @return Task
     */
    public function setIdentity(TaskIdentity $taskIdentity): self
    {
        $this->identity = $taskIdentity;
        return $this;
    }
}