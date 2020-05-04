<?php


namespace Docler\Application\Service;

/**
 * Class Task
 * @package Docler\Application\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class Task
{
    /**
     * @var int
     */
    private $identity;
    /**
     * @var bool
     */
    private $isCompleted;
    /**
     * @var string
     */
    private $name;

    public function __construct(int $identity, bool $isCompleted, string $name)
    {
        $this->identity = $identity;
        $this->isCompleted = $isCompleted;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getIdentity(): int
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
    public function isCompleted(): bool
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
    public function getName(): string
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


}