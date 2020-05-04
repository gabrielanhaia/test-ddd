<?php


namespace App\Task\Domain\Event;

use Docler\Domain\Core\Event\DomainEvent;
use Docler\Domain\Task\Entity\UserIdentity;

/**
 * Class TaskCompleted
 *
 * @package App\Task\Domain\Event
 *
 * @author Gabriel Annhaia <anhaia.gabriel@gmail.com>
 */
class TaskCompleted extends DomainEvent
{
    /** @var UserIdentity $userId */
    private $userId;

    /** @var string $userEmail */
    private $userEmail;

    /**
     * TaskCompleted constructor.
     * @param UserIdentity $userIdentity
     * @param string $userEmail
     * @throws \Exception
     *
     *
     * TODO: Task como parametro.
     */
    public function __construct(UserIdentity $userIdentity, string $userEmail)
    {
        $this->userId = $userIdentity;
        $this->userEmail = $userEmail;
        $this->occurredOn = new \DateTimeImmutable();
    }

    public function userId(): UserIdentity
    {
        return $this->userId;
    }

    public function userEmail(): string
    {
        return $this->userEmail;
    }

    public function occurredOn()
    {
        // TODO: Implement occurredOn() method.
    }

    /**
     * @return mixed|void
     */
    public function publish()
    {

        // Faz algo....
    }
}