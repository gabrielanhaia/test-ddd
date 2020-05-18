<?php

namespace DDD\Domain\Core\Event;

/**
 * Class DomainEvent
 * @package DDD\Domain\Core\Event
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
     * @return string
     */
    abstract public function getEventName(): string ;
}