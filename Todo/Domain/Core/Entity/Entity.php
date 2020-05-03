<?php


namespace Docler\Domain\Core;


abstract class Entity
{
    /**
     * @var Identity
     */
    protected $id;

    public function __construct(Identity $id)
    {
        $this->id = $id;
    }

    /**
     * @return Identity
     */
    protected function id(): Identity
    {
        return $this->id;
    }
}