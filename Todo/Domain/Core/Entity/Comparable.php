<?php


namespace Docler\Domain\Core\Entity;

/**
 * Interface IComparable
 * @package Docler\Domain\Core\Entity
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