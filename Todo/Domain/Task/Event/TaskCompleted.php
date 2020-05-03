<?php


namespace App\Task\Domain\Event;

use Docler\Domain\Core\Event\DomainEvent;

class TaskCompleted implements DomainEvent
{
    private $userId;
    private $userEmail;
    private $occurredOn;

    public function __construct(int $userId, $userEmail)
    {
        $this->userId = $userId;
        $this->userEmail = $userEmail;
        $this->occurredOn = new \DateTimeImmutable();
    }

    public function userId(): int
    {
        return $this->userId;
    }

    public function userEmail(): string
    {
        return $this->userEmail;
    }

    public function occurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }
}