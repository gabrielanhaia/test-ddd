<?php


namespace Tests\Unit\Domain\Factory;

use Docler\Domain\Task\Entity\User as UserEntity;
use Docler\Domain\Task\Entity\UserIdentity;
use Docler\Domain\Task\Factory\UserFactory;
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