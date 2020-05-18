<?php

namespace DDD\Domain\Task\Event;

use DDD\Domain\{Core\Event\DomainEvent, Task\Entity\Task};

/**
 * Class TaskCompleted
 *
 * @package App\Task\Domain\Event
 *
 * @author Gabriel Annhaia <anhaia.gabriel@gmail.com>
 */
class TaskCompleted extends DomainEvent
{
    /** @var Task $task Task completed. */
    private $task;

    /**
     * TaskCompleted constructor.
     * @param Task $task
     * @throws \Exception
     */
    public function __construct(Task $task)
    {
        $this->occurredOn = new \DateTimeImmutable();
        $this->task = $task;
    }

    /**
     * @return Task
     */
    public function task(): Task
    {
        return $this->task;
    }


    public function occurredOn()
    {
        return $this->occurredOn;
    }

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return self::class;
    }
}