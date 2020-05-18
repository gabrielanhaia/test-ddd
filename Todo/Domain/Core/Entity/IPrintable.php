<?php


namespace DDD\Domain\Core\Entity;

/**
 * Interface IEntity
 * @package DDD\Domain\Core\Entity
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
interface IPrintable
{
    /**
     * Object to string.
     *
     * @return string
     */
    public function __toString(): string;
}