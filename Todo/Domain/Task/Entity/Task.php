<?php


namespace Docler\Domain\Task;

use Docler\Domain\Core\Entity;
use Docler\Domain\Core\Identity;

/**
 * Class Task
 * @package Docler\Domain\Task
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class Task extends Entity
{
    /** @var string $name */
    private $name;

    private $isCompleted;

    /**
     * Task constructor.
     * @param Identity $id
     * @param string $name
     * @param bool $isCompleted
     */
    public function __construct(Identity $id, string $name, bool $isCompleted)
    {
        $this->name = $name;
        $this->isCompleted = $isCompleted;
        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isCompleted(): bool
    {
        return $this->isCompleted;
    }
}