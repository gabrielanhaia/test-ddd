<?php


namespace Docler\Domain\Task\Validator;

use Docler\Domain\Task\Entity\Task as TaskEntity;
use Docler\Domain\Core\Exception\ValidatorException;

/**
 * Class TaskValidator
 * @package Docler\Domain\Task\Validator
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TaskValidator
{
    /** @var string CREATE_TASK Validation name for "CREATE_TASK". */
    const CREATE_TASK = 'CREATE_TASK';

    /**
     * Validate task creation.
     *
     * @param TaskEntity $task
     * @throws ValidatorException
     */
    public function validateCreateTask(TaskEntity $task): void
    {
        if (!empty($task->identity()->getId())) {
            throw new ValidatorException(
                self::CREATE_TASK,
                $task,
                'A task identity already exists.'
            );
        }

        if (empty($task->name())) {
            throw new ValidatorException(
                self::CREATE_TASK,
                $task,
                'Invalid name creating a task.'
            );
        }

        if (empty($task->isCompleted())) {
            throw new ValidatorException(
                self::CREATE_TASK,
                $task,
                'Invalid field "is_complete" creating a task.'
            );
        }

        if (empty($task->userIdentity()) || empty($task->userIdentity()->getId())) {
            throw new ValidatorException(
                self::CREATE_TASK,
                $task,
                'Invalid user identity.'
            );
        }
    }
}