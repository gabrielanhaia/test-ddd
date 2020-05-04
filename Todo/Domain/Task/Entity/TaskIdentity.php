<?php


namespace Docler\Domain\Task\Entity;

use App\Domain\Task\TaskId;
use Docler\Domain\Core\Entity\Comparable;
use Docler\Domain\Core\Entity\IPrintable;

/**
 * Class TaskIdentity
 * @package Docler\Domain\Task\Entity
 *
 * @author Gabriel Annhaia <anhaoa.gabriel@gmail.com>
 */
class TaskIdentity implements IPrintable
{
    use Comparable;

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
    public function __toString(): string
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

    /**
     * Define the interface to compare objects.
     *
     * @param TaskIdentity $taskIdentityToCompare
     * @return bool
     */
    function equal(TaskIdentity $taskIdentityToCompare): bool
    {
        return ($taskIdentityToCompare->getId() === $this->getId());
    }
}