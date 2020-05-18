<?php


namespace DDD\Domain\Core\Event;

/**
 * Interface IEventListener
 * @package DDD\Domain\Core\Event
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
interface IEventListener
{
    /**
     * Method responsible for handling an event.
     *
     * @param DomainEvent $event
     * @return mixed
     */
    public function handle(DomainEvent $event);
}