<?php


namespace Docler\Application\Task\Service;

/**
 * Class Task
 * @package Docler\Application\Task\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class Task
{
    /** @var int $identity */
    private $identity;

    /** @var bool $isCompleted */
    private $isCompleted;

    /** @var string $name */
    private $name;

    /** @var int $userIdentity */
    private $userIdentity;


    public function __construct(
        int $identity = null,
        bool $isCompleted = null,
        string $name = null,
        int $userIdentity = null
    )
    {
        $this->identity = $identity;
        $this->isCompleted = $isCompleted;
        $this->name = $name;
        $this->userIdentity = $userIdentity;
    }

    /**
     * @return int
     */
    public function getIdentity(): ?int
    {
        return $this->identity;
    }

    /**
     * @param int $identity
     * @return Task
     */
    public function setIdentity(int $identity): Task
    {
        $this->identity = $identity;
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
     * @param bool $isCompleted
     * @return Task
     */
    public function setIsCompleted(bool $isCompleted): Task
    {
        $this->isCompleted = $isCompleted;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Task
     */
    public function setName(string $name): Task
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserIdentity(): int
    {
        return $this->userIdentity;
    }

    /**
     * @param int $userIdentity
     * @return Task
     */
    public function setUserIdentity(int $userIdentity): Task
    {
        $this->userIdentity = $userIdentity;
        return $this;
    }
}