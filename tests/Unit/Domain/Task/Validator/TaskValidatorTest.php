<?php


namespace Tests\Unit\Domain\Task\Validator;

use DDD\Domain\{
    Core\Exception\ValidatorException,
    Task\Entity\Task as TaskEntity,
    Task\Entity\TaskIdentity,
    Task\Entity\UserIdentity,
    Task\Validator\TaskValidator
};
use Tests\Unit\TestCase;

/**
 * Class TaskValidatorTest
 * @package Tests\Unit\Domain\Task\Validator
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TaskValidatorTest extends TestCase
{
    /**
     * Test validation errors before create a task.
     *
     * @dataProvider dataProviderTestErrorCreateTaskValidator
     *
     * @param string $errorMessage
     * @param TaskEntity $taskEntity
     *
     * @throws ValidatorException
     */
    public function testErrorCreateTaskValidator(string $errorMessage, TaskEntity $taskEntity)
    {
        $this->expectException(ValidatorException::class);
        $this->expectExceptionMessage($errorMessage);

        $taskValidator = new TaskValidator;

        try {
            $taskValidator->validateCreateTask($taskEntity);
        } catch (ValidatorException $exception) {
            $this->assertEquals(TaskEntity::class, $exception->getEntityName());
            throw $exception;
        }
    }

    /**
     * Data provider for the test {@see testErrorCreateTaskValidator}
     */
    public function dataProviderTestErrorCreateTaskValidator()
    {
        return [
            [
                'errorMessage' => 'A task identity already exists.',
                'taskEntity' => new TaskEntity(new TaskIdentity(123), new UserIdentity),
            ],
            [
                'errorMessage' => 'Invalid name creating a task.',
                'taskEntity' => new TaskEntity(new TaskIdentity, new UserIdentity),
            ],
            [
                'errorMessage' => 'Invalid field "is_complete" creating a task.',
                'taskEntity' => new TaskEntity(
                    new TaskIdentity,
                    new UserIdentity,
                    'TEST NAME'
                ),
            ],
            [
                'errorMessage' => 'Invalid user identity.',
                'taskEntity' => new TaskEntity(
                    new TaskIdentity,
                    new UserIdentity,
                    'TEST NAME',
                    true
                ),
            ],
        ];
    }

    /**
     * Test success when validating task entity before create one.
     * @throws ValidatorException
     */
    public function testSuccessCreateTaskValidator()
    {
        $this->expectNotToPerformAssertions();

        $validTaskEntity = new TaskEntity(
            new TaskIdentity,
            new UserIdentity(122323),
            'TASK NAME TEST',
            true
        );

        $taskValidator = new TaskValidator;
        $taskValidator->validateCreateTask($validTaskEntity);
    }
}