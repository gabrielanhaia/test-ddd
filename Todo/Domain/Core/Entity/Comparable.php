<?php


namespace DDD\Domain\Core\Entity;

/**
 * Interface IComparable
 * @package DDD\Domain\Core\Entity
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
trait Comparable
{
    /**
     * Define the interface to compare objects.
     *
     * @param Comparable $object
     * @return bool
     */
    abstract function equal(self $object): bool;
}