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

    /** @var mixed $currentData Data validated. */
    private $currentData;

    /**
     * ValidatorException constructor.
     *
     * @param string $validationName
     * @param object $entityName
     * @param $currentData
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(
        string $validationName,
        object $entityName,
        $currentData,
        $message = "",
        $code = 0,
        Throwable $previous = null
    )
    {
        parent::__construct($message, $code, $previous);
        $this->validationName = $validationName;
        $this->entityName = get_class($entityName);
        $this->currentData = $currentData;
    }
}