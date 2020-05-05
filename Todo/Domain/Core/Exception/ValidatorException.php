<?php


namespace Docler\Domain\Core\Exception;

use Throwable;

/**
 * Class ValidatorException
 * @package Docler\Exception
 */
class ValidatorException extends \Exception
{
    /** @var string $validationName Name of the validation. */
    private $validationName;

    /** @var string $entityName Class name. */
    private $entityName;

    /**
     * ValidatorException constructor.
     *
     * @param string $validationName
     * @param object $entityName
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(
        string $validationName,
        object $entityName,
        $message = "",
        $code = 0,
        Throwable $previous = null
    )
    {
        parent::__construct($message, $code, $previous);
        $this->validationName = $validationName;
        $this->entityName = get_class($entityName);
    }

    /**
     * @return string
     */
    public function getValidationName(): string
    {
        return $this->validationName;
    }

    /**
     * @param string $validationName
     * @return ValidatorException
     */
    public function setValidationName(string $validationName): ValidatorException
    {
        $this->validationName = $validationName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEntityName(): string
    {
        return $this->entityName;
    }

    /**
     * @param string $entityName
     * @return ValidatorException
     */
    public function setEntityName(string $entityName): ValidatorException
    {
        $this->entityName = $entityName;
        return $this;
    }
}