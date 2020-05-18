<?php


namespace DDD\Domain\Task\Factory;


use DDD\Domain\Task\Contract\Factory\IUserFactory;
use DDD\Domain\Task\Entity\User;
use DDD\Domain\Task\Entity\UserIdentity;

/**
 * Class UserFactory
 * @package DDD\Domain\Task\Factory
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class UserFactory implements IUserFactory
{

    /**
     * @param UserIdentity $userIdentity
     * @param string $name
     * @return User
     */
    public function build(UserIdentity $userIdentity, string $name = null): User
    {
        $user = new User($userIdentity);

        if (!empty($name)) {
            $user->setName($name);
        }

        return $user;
    }
}