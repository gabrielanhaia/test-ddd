<?php


namespace Tests\Unit\Application\Task\Service;

use DDD\Application\Task\Service\CompleteTaskService;
use DDD\Application\Task\Service\Task as TaskRequestResponse;
use DDD\Domain\Task\Contract\Repository\ITaskRepository;
use DDD\Domain\Task\Entity\{Task, TaskIdentity, UserIdentity};
use DDD\Domain\Task\Service\TaskService;
use Tests\Unit\TestCase;

/**
 * Class CompleteTaskServiceTest
 * @package Tests\Unit\Application\Task\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CompleteTaskServiceTest extends TestCase
{
    /**
     * Test method executing the service to set a task as complete.
     * @throws \Exception
     */
    public function testExecuteCompleteTask()
    {
        $taskIdentity = new TaskIdentity(1232123);
        $userIdentity = new UserIdentity(444343);
        $taskEntity = new Task(
            $taskIdentity,
            $userIdentity,
            'TEST_TASK',
            true
        );

        $taskRepositoryMock = \Mockery::mock(ITaskRepository::class);
        $domainTaskServiceMock = \Mockery::mock(TaskService::class);
        $domainTaskServiceMock->shouldReceive('completeTask')
            ->once()
            ->with(\Mockery::on(function ($argument) use ($taskIdentity) {
                return $taskIdentity->equal($argument);
            }))
            ->andReturn($taskEntity);

        $completeTaskService = new CompleteTaskService($taskRepositoryMock, $domainTaskServiceMock);
        $taskResponse = $completeTaskService->execute($taskIdentity->getId());

        $expectedTaskResponse = new TaskRequestResponse(
            $taskEntity->identity()->getId(),
            $taskEntity->isCompleted(),
            $taskEntity->name(),
            $taskEntity->userIdentity()->getId()
        );

        $this->assertEquals($expectedTaskResponse, $taskResponse);
    }
}