<?php


namespace Docler\Domain\Task\Entity;

/**
 * Class TaskIdentity
 * @package Docler\Domain\Task\Entity
 *
 * @author Gabriel Annhaia <anhaoa.gabriel@gmail.com>
 */
class TaskIdentity
{
    /** @var int $id */
    protected $id;

    /**
     * Identity constructor.
     * @param int $id
     */
    public function __construct(int $id = null)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->id;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}