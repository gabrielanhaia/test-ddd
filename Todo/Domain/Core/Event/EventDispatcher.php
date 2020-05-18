<?php


namespace DDD\Domain\Core\Event;

use DDD\Domain\Core\Exception\EventException;
use DDD\Domain\Task\Event\TaskCompleted;

/**
 * Class EventManager
 * @package DDD\Domain\Core\Event
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
    protected $listeners;

    /**
     * EventManager constructor.
     */
    private function __construct()
    {
        $this->listeners = [];
    }

    public static function createEvent()
    {
        // ..
    }

    /**
     * Clone method not supported.
     */
    public function __clone()
    {
        throw new \BadMethodCallException('Clone is not supported.');
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
            throw new EventException('Event not allowed.');
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
    public function dispatchNow(DomainEvent $event): void
    {
        $eventName = $event->getEventName();

        if (empty($this->listeners[$eventName])) {
            return;
        }

        foreach ($this->listeners[$eventName] as $listener) {
            $listener->handle($event);
        }
    }
}