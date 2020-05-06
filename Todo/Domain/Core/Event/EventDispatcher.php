<?php


namespace Docler\Domain\Core\Event;

use App\Task\Domain\Event\TaskCompleted;

/**
 * Class EventManager
 * @package Docler\Domain\Core\Event
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class EventDispatcher
{
    /** @var array $eventsAllowed Event classes allowed for listeners. */
    private $eventsAllowed = [
        TaskCompleted::class
    ];

    /** @var IEventListener[] $listeners List of listeners to be processed/dispatched. */
    private $listeners;

    /**
     * EventManager constructor.
     */
    public function __construct()
    {
        $this->listeners = [];
    }

    /**
     * Clone method not supported.
     */
    public function __clone()
    {
        throw new \BadMethodCallException('Clone is not supported');
    }

    /**
     * Add a listener to the event list.
     *
     * @param IEventListener $listener
     * @param string $eventName
     * @throws \Exception
     */
    public function addListener(IEventListener $listener, string $eventName)
    {
        if (!in_array($eventName, $this->eventsAllowed)) {
            throw new \Exception('Event not allowed.');
        }

        $this->listeners[$eventName][] = $listener;
    }

    /**
     * Async dispatch.
     *
     * @param DomainEvent $event Event to be dispatched.
     */
    public function dispatch(DomainEvent $event)
    {
        // TODO: Dispatch it async.
    }

    /**
     * Dispatch an event to their listeners.
     *
     * @param DomainEvent $event Event to be dispatched.
     */
    public function dispatchNow(DomainEvent $event)
    {
        foreach ($this->listeners as $listener) {
            $listener->handle($event);
        }
    }
}