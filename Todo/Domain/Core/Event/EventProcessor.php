<?php


namespace Docler\Domain\Core\Event;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class EventProcessor
 * @package Docler\Domain\Core\Event
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class EventProcessor
{
    /** @var DomainEvent[] $events List of events to be processed/dispatched. */
    protected $events;


    public function __construct()
    {
        $this->events = new ArrayCollection;
    }

    public function __clone()
    {
        throw new \BadMethodCallException('Clone is not supported');
    }

    /**
     * @param DomainEvent $event
     */
    public function addEvent(DomainEvent $event)
    {
        $this->events->add($event);
    }

    /**
     *
     */
    public function publish()
    {
        foreach ($this->events as $event) {
            $event->publish();
        }
    }
}