<?php


namespace Tests\Unit\Application\Task\Service;

use DDD\Application\Task\Service\GetTaskService;
use DDD\Application\Task\Service\Task as TaskRequestResponse;
use DDD\Domain\Task\Contract\Repository\ITaskRepository;
use DDD\Domain\Task\Entity\{Task, TaskIdentity, UserIdentity};
use DDD\Domain\Task\Service\TaskService;
use Tests\Unit\TestCase;

/**
 * Class GetTaskServiceTest
 * @package Tests\Unit\Application\Task\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class GetTaskServiceTest extends TestCase
{
    /**
     * Test method executing the service to get a task by id.
     * @throws \Exception
     */
    public function testExecuteGetTask()
    {
        $taskIdentity = new TaskIdentity(1232123);
        $taskEntity = new Task(
            $taskIdentity,
            new UserIdentity,
            'TEST_TASK',
            true
        );

        $taskRepositoryMock = \Mockery::mock(ITaskRepository::class);
        $domainTaskServiceMock = \Mockery::mock(TaskService::class);
        $domainTaskServiceMock->shouldReceive('getTask')
            ->once()
            ->with(\Mockery::on(function ($argument) use ($taskIdentity) {
                return $taskIdentity->equal($argument);
            }))
            ->andReturn($taskEntity);

        $getTaskService = new GetTaskService($taskRepositoryMock, $domainTaskServiceMock);
        $taskResponse = $getTaskService->execute($taskIdentity->getId());

        $expectedTaskResponse = new TaskRequestResponse(
            $taskEntity->identity()->getId(),
            $taskEntity->isCompleted(),
            $taskEntity->name()
        );

        $this->assertEquals($expectedTaskResponse, $taskResponse);
    }
}