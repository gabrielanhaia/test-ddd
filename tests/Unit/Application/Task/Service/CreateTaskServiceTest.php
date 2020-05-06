<?php


namespace Tests\Unit\Application\Task\Service;

use Docler\Application\Task\Service\CreateTaskService;
use Docler\Application\Task\Service\Task as TaskRequestResponse;
use Docler\Domain\Task\Contract\Factory\ITaskFactory;
use Docler\Domain\Task\Contract\Repository\ITaskRepository;
use Docler\Domain\Task\Entity\{Task, TaskIdentity, UserIdentity};
use Docler\Domain\Task\Service\TaskService;
use Tests\Unit\TestCase;

/**
 * Class CreateTaskServiceTest
 * @package Tests\Unit\Application\Task\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CreateTaskServiceTest extends TestCase
{
    /**
     * Test method executing the service to get a task by id.
     * @throws \Exception
     */
    public function testExecuteCreateTask()
    {
        $taskIdentity = new TaskIdentity();
        $userIdentity = new UserIdentity(2444443);
        $taskName = 'TASK_TEST_NAME';
        $taskIsCompleted = true;
        $taskRequest = new TaskRequestResponse(
            null,
            $taskIsCompleted,
            $taskName,
            $userIdentity->getId()
        );

        $taskBuilded = new Task(
            $taskIdentity,
            $userIdentity,
            $taskName,
            $taskIsCompleted
        );

        $taskRepositoryMock = \Mockery::mock(ITaskRepository::class);
        $taskFactoryMock = \Mockery::mock(ITaskFactory::class);

        $taskFactoryMock->shouldReceive('build')
            ->once()
            ->withArgs(
                function (TaskIdentity $taskId, UserIdentity $userId, $name, $isCompleted) use ($taskBuilded) {
                    $result = is_null($taskId->getId())
                        && ($userId->equal($taskBuilded->userIdentity()))
                        && ($name === $taskBuilded->name())
                        && ($isCompleted === $taskBuilded->isCompleted());

                    return $result;
            })
            ->andReturn($taskBuilded);

        $newTaskIdentity = new TaskIdentity(1232132);
        $taskCreated = clone $taskBuilded;
        $taskCreated->setIdentity($newTaskIdentity);

        $domainTaskServiceMock = \Mockery::mock(TaskService::class);
        $domainTaskServiceMock->shouldReceive('createTask')
            ->once()
            ->with(\Mockery::on(function ($task) use ($taskBuilded) {
                return $task == $taskBuilded;
            }))
            ->andReturn($taskCreated);

        $getTaskService = new CreateTaskService($taskRepositoryMock, $taskFactoryMock, $domainTaskServiceMock);
        $taskResponse = $getTaskService->execute($taskRequest);

        $expectedTaskResponse = new TaskRequestResponse(
            $taskCreated->identity()->getId(),
            $taskIsCompleted,
            $taskName,
            $userIdentity->getId()
        );

        $this->assertEquals($expectedTaskResponse, $taskResponse);
    }
}