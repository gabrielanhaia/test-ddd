<?php


namespace Docler\Infrastructure\Task\Repository\Fake;

use Docler\Domain\Task\Contract\Repository\ITaskRepository;
use Docler\Domain\Task\Contract\Repository\IUserTaskRepository;
use Docler\Domain\Task\Entity\Task;
use Docler\Domain\Task\Entity\TaskIdentity;
use Docler\Domain\Task\Entity\User as UserEntity;
use Docler\Domain\Task\Entity\UserIdentity;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Class FakeUserTaskRepository
 * @package Docler\Infrastructure\Task\Repository
 *
 *
 *
 * TODO: Inject user id __construct...
 */
class FakeUserTaskRepository extends IUserTaskRepository
{
    /**
     * @return UserEntity
     */
    public function getTasks(): UserEntity
    {
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