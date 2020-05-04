<?php

namespace Docler\Domain\Task\Entity;

use Docler\Domain\Core\Entity\IPrintable;

/**
 * Class Task
 * @package Docler\Domain\Task
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
        string $name,
        bool $isCompleted
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
    public function name(): string
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
    }

    /**
     * @return bool
     */
    public function isCompleted(): bool
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

    public function completed()
    {
        $this->isCompleted = true;
    }

    public function __toString(): string
    {
        // TODO: Implement __toString() method.
    }
}