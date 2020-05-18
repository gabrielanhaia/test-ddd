<?php

use DDD\Application\Service\Task\CreateTaskService;
use DDD\Application\Service\Task\DeleteTaskService;
use DDD\Application\Service\Task\GetTaskService;
use DDD\Application\Service\Task\CompleteTaskService;
use DDD\Application\Service\Task\IncompleteTaskService;
use DDD\Domain\Task\Factory\TaskFactory;
use DDD\Domain\Task\Factory\UserFactory;
use DDD\Domain\Task\Service\TaskService;
use DDD\Domain\Task\Validator\TaskValidator;
use DDD\Infrastructure\Repository\Fake\FakeTaskRepository;

require_once(__DIR__ . '/../vendor/autoload.php');

// DI would be here...... (Service Container)

$userFactory = new UserFactory;
$taskFactory = new TaskFactory;

$taskValidator = new TaskValidator;

$taskRepository = new FakeTaskRepository($taskFactory);
$domainTaskService = new TaskService($taskRepository, $taskValidator);

$controllerTest = new TController();

try {

// GET TASK.
//$controllerTest->getTask(1, new GetTaskService(
//        new FakeTaskRepository($taskFactory)
//    )
//);

// COMPLETE TASK.
//$controllerTest->completeTask(
//    6666, new CompleteTaskService(
//        new FakeTaskRepository($taskFactory)
//    )
//);

// INCOMPLETE TASK.
//$controllerTest->incompleteTask(
//    6666, new IncompleteTaskService(
//        new FakeTaskRepository($taskFactory)
//    )
//);

//$controllerTest->deleteTask(1, new DeleteTaskService(
//        new FakeTaskRepository($taskFactory)
//    )
//);

    $controllerTest->createTask(
        [
            'is_completed' => true,
            'user_id' => 12323,
            'name' => 'Test task.'
        ],
        new CreateTaskService(
            $taskRepository,
            $taskFactory,
            $domainTaskService
        )
    );

} catch (\Exception $exception) {
    dd($exception);
}

/**
 * Class TController
 * @package DDD\Application\Controller
 */
class TController
{
    /**
     * @param int $taskId
     * @param GetTaskService $getTaskService
     */
    public function getTask(int $taskId, GetTaskService $getTaskService)
    {
        $task = $getTaskService->execute($taskId);

        dd($task);
    }

    /**
     * @param int $taskId
     * @param CompleteTaskService $completeTaskService
     */
    public function completeTask(
        int $taskId,
        CompleteTaskService $completeTaskService
    )
    {
        try {
            $task = $completeTaskService->execute($taskId);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        dd(['SUCCESS' => $task]);
    }

    /**
     * @param int $taskId
     * @param IncompleteTaskService $incompleteTaskService
     */
    public function incompleteTask(
        int $taskId,
        IncompleteTaskService $incompleteTaskService
    )
    {
        try {
            $task = $incompleteTaskService->execute($taskId);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        dd(['SUCCESS' => $task]);
    }

    /**
     * @param int $taskId
     * @param DeleteTaskService $deleteTaskService
     * @throws Exception
     */
    public function deleteTask(int $taskId, DeleteTaskService $deleteTaskService)
    {
        $deleteTaskService->execute($taskId);

        dd('DELETED');
    }

    /**
     * @param array $requestObject
     * @param CreateTaskService $createTaskService
     */
    public function createTask(array $requestObject, CreateTaskService $createTaskService)
    {
        $taskRequestResponse = new DDD\Application\Service\Task\Task(
            null,
            $requestObject['is_completed'],
            $requestObject['name'],
            $requestObject['user_id']
        );

        $task = $createTaskService->execute($taskRequestResponse);

        dd($task);
    }
}