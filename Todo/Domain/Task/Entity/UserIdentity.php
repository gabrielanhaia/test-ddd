<?php


namespace DDD\Domain\Task\Entity;

use DDD\Domain\Core\Entity\Comparable;
use DDD\Domain\Core\Entity\IPrintable;

/**
 * Class UserIdentity
 * @package DDD\Domain\Task\Entity
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class UserIdentity implements IPrintable
{
    use Comparable;

    /** @var int $id User identity. */
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
        return (string) $this->getId();
    }

    /**
     * Define the interface to compare objects.
     *
     * @param UserIdentity $userIdentityToCompare
     * @return bool
     */
    function equal(UserIdentity $userIdentityToCompare): bool
    {
        return ($userIdentityToCompare->getId() === $this->getId());
    }
}