<?php

namespace Docler\Domain\Core\Event;

/**
 * Class DomainEvent
 * @package Docler\Domain\Core\Event
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
abstract class DomainEvent
{
    /** @var \DateTimeImmutable $occurredOn */
    protected $occurredOn;

    /**
     * @return \DateTimeImmutable
     */
    abstract public function occurredOn();

    /**
     * @return mixed
     */
    abstract public function publish();
}