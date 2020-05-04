<?php


namespace Docler\Application\Controller;

use Docler\Application\Service\GetTaskService;
use Docler\Domain\Task\Entity\TaskIdentity;
use Docler\Domain\Task\Entity\UserIdentity;
use Docler\Domain\Task\Service\TaskService;
use Docler\Domain\Task\Service\UserService;

/**
 * Class TController
 * @package Docler\Application\Controller
 */
class TController
{
    /** @var TaskService $taskService */
    private $taskService;
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(TaskService $taskService, UserService $userService)
    {
        $this->taskService = $taskService;
        $this->userService = $userService;
    }

    // TASK CONTROLLER

    public function getTask(int $taskId, GetTaskService $getTaskService)
    {
        $task = $getTaskService->execute($taskId);

        dd($task);
    }

//    public function listTasks()
//    {
//        // TODO: Get user id someway
//        $userId = 123214;
//
//        $userIdentity = new UserIdentity($userId);
//
//        $user = $this->userService->listLastTasks($userIdentity);
//
//        dd($user->tasks());
//    }
//
//
//    public function completeTask(int $idTask)
//    {
//        $taskIdentity = new TaskIdentity($idTask);
//
//        $this->taskService->completeTask($taskIdentity);
//    }
//
//    public function incompleteTask()
//    {
//
//    }
}