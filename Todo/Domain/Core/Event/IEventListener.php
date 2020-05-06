<?php


namespace Docler\Domain\Core\Event;

/**
 * Interface IEventListener
 * @package Docler\Domain\Core\Event
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