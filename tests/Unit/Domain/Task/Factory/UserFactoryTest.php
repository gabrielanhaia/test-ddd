<?php

namespace Tests\Unit\Domain\Task\Factory;

use DDD\Domain\Task\Entity\User as UserEntity;
use DDD\Domain\Task\Entity\UserIdentity;
use DDD\Domain\Task\Factory\UserFactory;
use Tests\Unit\TestCase;

/**
 * Class UserFactoryTest
 * @package Tests\Unit\Domain\Factory
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class UserFactoryTest extends TestCase
{
    /**
     * Test success creating a user entity using the default factory.
     */
    public function testCreatingATaskEntity()
    {
        $userIdentity = new UserIdentity(123);

        $expectedUser = new UserEntity($userIdentity);
        $userFactory = new UserFactory;

        $result = $userFactory->build($userIdentity);
        $this->assertEquals($expectedUser, $result);
    }
}