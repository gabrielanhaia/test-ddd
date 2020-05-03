<?php


namespace Docler\Domain\Core;


class Identity
{
    /** @var int $id */
    protected $id;

    /**
     * Identity constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}