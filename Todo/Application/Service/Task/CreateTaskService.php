<?php


namespace Docler\Application\Service\Task;

use Docler\Domain\Task\Contract\Factory\ITaskFactory;
use Docler\Domain\Task\Contract\Repository\ITaskRepository;
use Docler\Application\Service\Task\Task as TaskRequestResponse;
use Docler\Domain\Task\Entity\TaskIdentity;
use Docler\Domain\Task\Entity\UserIdentity;

/**
 * Class CreateTaskService
 * @package Docler\Application\Service\Task
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CreateTaskService extends TaskService
{
    /** @var ITaskFactory Task factory. */
    private $taskFactory;

    /**
     * CreateTaskService constructor.
     *
     * @param ITaskRepository $taskRepository
     * @param ITaskFactory $taskFactory
     */
    public function __construct(ITaskRepository $taskRepository, ITaskFactory $taskFactory)
    {
        parent::__construct($taskRepository);
        $this->taskFactory = $taskFactory;
    }

    /**
     * Create a new task.
     *
     * @param Task $taskRequestResponse DTO object with the task data.
     * @return Task
     */
    public function execute(TaskRequestResponse $taskRequestResponse): TaskRequestResponse
    {
        $taskIdentity = new TaskIdentity($taskRequestResponse->getIdentity());
        $userIdentity = new UserIdentity($taskRequestResponse->getUserIdentity());

        $task = $this->taskFactory->build(
            $taskIdentity,
            $userIdentity,
            $taskRequestResponse->getName(),
            $taskRequestResponse->isCompleted()
        );

        $taskCreated = $this->taskRepository->storeTask($task);

        $taskRequestResponse->setIdentity($taskCreated->identity()->getId());

        return $taskRequestResponse;
    }
}