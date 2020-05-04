<?php


namespace Docler\Application\Service;

use Docler\Domain\Task\Contract\Repository\ITaskRepository;
use Docler\Domain\Task\Entity\TaskIdentity;

/**
 * Class CompleteTask
 * @package Docler\Application\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CompleteTaskService
{
    /** @var ITaskRepository $taskRepository */
    private $taskRepository;

    /**
     * CompleteTaskService constructor.
     * @param ITaskRepository $taskRepository
     */
    public function __construct(ITaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Execute de complete task service.
     *
     * @param int $taskId
     * @return Task
     *
     * @throws \Exception
     */
    public function execute(int $taskId): Task
    {
        $taskIdentity = new TaskIdentity($taskId);

        $taskEntity = $this->taskRepository->getTask($taskIdentity);

        if (empty($taskEntity)) {
            throw new \Exception('Task not found.');
        }

        $taskEntity->completed();

        $taskEntity = $this->taskRepository->updateStatusTask($taskEntity);

        $taskResponse = new Task(
            $taskEntity->identity()->getId(),
            $taskEntity->isCompleted(),
            $taskEntity->name()
        );

        return $taskResponse;
    }
}