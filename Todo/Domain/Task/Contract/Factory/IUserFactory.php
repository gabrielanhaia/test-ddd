<?php


namespace DDD\Domain\Task\Contract\Factory;

use DDD\Domain\Task\Entity\{User, UserIdentity};

/**
 * Interface UserFactory
 * @package DDD\Domain\Task\Contract\Factory
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
interface IUserFactory
{
    /**
     * @param UserIdentity $userIdentity
     * @param string $name
     * @return User
     */
    public function build(
        UserIdentity $userIdentity,
        string $name = null
    ): User;
}