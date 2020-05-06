<?php


namespace Tests\Unit\Domain\Core\Event;

use Docler\Domain\Core\Event\DomainEvent;
use Docler\Domain\Core\Event\EventDispatcher;
use Docler\Domain\Core\Event\IEventListener;
use Docler\Domain\Core\Exception\EventException;
use Docler\Domain\Task\Entity\Task;
use Docler\Domain\Task\Entity\TaskIdentity;
use Docler\Domain\Task\Entity\UserIdentity;
use Docler\Domain\Task\Event\TaskCompleted;
use Tests\Unit\TestCase;

/**
 * Class EventDispatcherTest
 * @package Tests\Unit\Domain\Core\Event
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class EventDispatcherTest extends TestCase
{
    /**
     * Method responsible for testing error trying to clone the event dispatcher.
     */
    public function testErrorTryingToCloneTheEventDispatcher()
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Clone is not supported');

        $eventDispatcher = new EventDispatcher;

        (clone $eventDispatcher);
    }

    /**
     * Method responsible for adding an invalid event to associate with a listener.
     * @throws \Exception
     */
    public function testErrorAddInvalidEventRelatedToAListener()
    {
        $this->expectException(EventException::class);
        $this->expectExceptionMessage('Event not allowed.');

        $invalidEventIdentity = 'TEST_INVALID_LISTENER++123213213';

        $listenerMock = \Mockery::mock(IEventListener::class);

        $eventDispatcher = new EventDispatcher;
        $eventDispatcher->addListener($listenerMock, $invalidEventIdentity);
    }

    /**
     * Test success adding listeners to the events available.
     *
     * @dataProvider dataProviderTestSuccessAddingListenersToEventsAvailable
     *
     * @param string $eventName
     * @throws \Exception
     */
    public function testSuccessAddingListenersToEventsAvailable(string $eventName)
    {
        $this->expectNotToPerformAssertions();
        $eventDispatcher = new EventDispatcher;
        $listenerMock = \Mockery::mock(IEventListener::class);
        $eventDispatcher->addListener($listenerMock, $eventName);
    }

    /**
     * @return array
     */
    public function dataProviderTestSuccessAddingListenersToEventsAvailable()
    {
        return [
            [
                'event_name' => TaskCompleted::class
            ]
        ];
    }
}