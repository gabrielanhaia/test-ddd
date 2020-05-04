<?php


namespace Docler\Domain\Task\Entity;

use Docler\Domain\Core\Entity\IPrintable;

/**
 * Class UserIdentity
 * @package Docler\Domain\Task\Entity
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class UserIdentity implements IPrintable
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
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Object to string.
     *
     * @return string
     */
    public function __toString(): string
    {
        // TODO: Implement __toString() method.
    }
}