<?php


namespace Docler\Infrastructure\Repository\Fake;

use Docler\Domain\Task\Contract\Repository\ITaskRepository;
use Docler\Domain\Task\Entity\Task;
use Docler\Domain\Task\Entity\TaskIdentity;
use Docler\Domain\Task\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Class FakeUserTaskRepository
 * @package Docler\Infrastructure\Repository
 *
 *
 *
 * TODO: Inject user id __construct...
 */
class FakeUserTaskRepository
{
    private $user;

    public function setUser(User $user)
    {
        $this->user = $user;
    }
    
    public function getTasks(): ArrayCollection
    {
        // TODO: Exceptionn user not found.

        // TODO: Implement getListOfTasks() method.
        $usersResultTasks = [
            [
                'name' => 'Test 1',
                'id' => 123213,
                'is_completed' => false,
            ],
            [
                'name' => 'Test 2',
                'id' => 13221,
                'is_completed' => false,
            ],
            [
                'name' => 'Test 3',
                'id' => 54545,
                'is_completed' => true,
            ]
        ];

        $user = $this->userFactory->build($this->user->getId());

        foreach ($usersResultTasks as $taskDatabase) {
            $user->addTask(
                $this->taskFactory->build(
                    new TaskIdentity($taskDatabase['id']),
                    $this->user->getId(),
                    $taskDatabase['name'],
                    $taskDatabase['is_completed']
                )
            );
        }

        return $user;
    }
}