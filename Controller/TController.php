<?php


namespace Docler\Application\Controller;

use Docler\Application\Service\CompleteTaskService;
use Docler\Application\Service\GetTaskService;
use Docler\Application\Service\Task;

/**
 * Class TController
 * @package Docler\Application\Controller
 */
class TController
{
    // TASK CONTROLLER

    public function getTask(int $taskId, GetTaskService $getTaskService)
    {
        $task = $getTaskService->execute($taskId);

        dd($task);
    }

    public function completeTask(int $taskId, CompleteTaskService $completeTaskService)
    {
        $task = $completeTaskService->execute($taskId);

        dd(['SUCCESS' => $task]);
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