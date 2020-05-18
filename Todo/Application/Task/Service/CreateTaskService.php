<?php


namespace DDD\Application\Task\Service;

use DDD\Domain\Task\Contract\Factory\ITaskFactory;
use DDD\Domain\Task\Contract\Repository\ITaskRepository;
use DDD\Application\Task\Service\Task as TaskRequestResponse;
use DDD\Domain\Task\Entity\TaskIdentity;
use DDD\Domain\Task\Entity\UserIdentity;
use DDD\Domain\Task\Service\TaskService as DomainTaskService;

/**
 * Class CreateTaskService
 * @package DDD\Application\Task\Service
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
     * @param DomainTaskService $domainTaskService
     */
    public function __construct(
        ITaskRepository $taskRepository,
        ITaskFactory $taskFactory,
        DomainTaskService $domainTaskService
    ) {
        parent::__construct($taskRepository, $domainTaskService);
        $this->taskFactory = $taskFactory;
    }

    /**
     * Create a new task.
     *
     * @param Task $taskRequestResponse DTO object with the task data.
     * @return Task
     * @throws \DDD\Domain\Core\Exception\ValidatorException
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

        $taskCreated = $this->domainTaskService->createTask($task);

        $taskRequestResponse->setIdentity($taskCreated->identity()->getId());

        return $taskRequestResponse;
    }
}