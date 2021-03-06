<?php

namespace Tests\Unit\Application\Task\Service;

use DDD\Application\Task\Service\DeleteTaskService;
use DDD\Domain\Task\Contract\Repository\ITaskRepository;
use DDD\Domain\Task\Entity\TaskIdentity;
use DDD\Domain\Task\Entity\UserIdentity;
use DDD\Domain\Task\Service\TaskService;
use Tests\Unit\TestCase;

/**
 * Class DeleteTaskServiceTest
 * @package Tests\Unit\Application\Task\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class DeleteTaskServiceTest extends TestCase
{
    /**
     * Test service responsible for deleting a task.
     * @throws \Exception
     */
    public function testExecuteDeleteTask()
    {
        $taskIdentity = new TaskIdentity(22222);
        $userIdentity = new UserIdentity(11111);

        $taskRepositoryMock = \Mockery::mock(ITaskRepository::class);
        $domainTaskServiceMock = \Mockery::mock(TaskService::class);
        $domainTaskServiceMock->shouldReceive('deleteTask')
            ->once()
            ->withArgs(function ($argumentUser, $argumentTask) use ($taskIdentity, $userIdentity) {
                return ($userIdentity->equal($argumentUser) && $taskIdentity->equal($argumentTask));
            })
            ->andReturnNull();

        $deleteTaskService = new DeleteTaskService($taskRepositoryMock, $domainTaskServiceMock);

        $result = $deleteTaskService->execute($taskIdentity->getId(), $userIdentity->getId());
        $this->assertNull($result);
    }
}