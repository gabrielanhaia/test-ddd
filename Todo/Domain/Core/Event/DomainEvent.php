<?php

namespace Docler\Domain\Core\Event;

interface DomainEvent
{
    /**
     * @return \DateTimeImmutable
     */
    public function occurredOn();
}