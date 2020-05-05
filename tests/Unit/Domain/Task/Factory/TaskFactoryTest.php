<?php


namespace Tests\Unit\Domain\Factory;

use Docler\Domain\Task\Entity\Task as TaskEntity;
use Docler\Domain\Task\Entity\TaskIdentity;
use Docler\Domain\Task\Entity\UserIdentity;
use Docler\Domain\Task\Factory\TaskFactory;
use Tests\Unit\TestCase;

/**
 * Class TaskFactoryTest
 * @package Tests\Unit\Domain\Factory
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TaskFactoryTest extends TestCase
{
    /**
     * Test success creating a task entity using the default factory.
     */
    public function testCreatingATaskEntity()
    {
        $taskIdentity = new TaskIdentity;
        $userIdentity = new UserIdentity;
        $name = 'TASK_NAME';
        $isCompleted = true;

        $expectedTask = new TaskEntity($taskIdentity, $userIdentity, $name, $isCompleted);
        $taskFactory = new TaskFactory;

        $result = $taskFactory->build($taskIdentity, $userIdentity, $name, $isCompleted);
        $this->assertEquals($expectedTask, $result);
    }
}