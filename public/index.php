<?php

use Docler\Application\Controller\TController;
use Docler\Domain\Task\Factory\TaskFactory;
use Docler\Domain\Task\Factory\UserFactory;
use Docler\Domain\Task\Service\TaskService;
use Docler\Domain\Task\Service\UserService;
use Docler\Infrastructure\Repository\FakeTaskRepository;
use Docler\Infrastructure\Repository\FakeUserRepository;

require_once('../vendor/autoload.php');

// DI would be here...... (Service Container)

$userFactory = new UserFactory;
$taskFactory = new TaskFactory;

$taskRepository = new FakeTaskRepository($taskFactory);
$taskService = new TaskService($taskRepository);

$userRepository = new FakeUserRepository($userFactory, $taskFactory);
// TODO: Create user_task repository.
$userService = new UserService($userRepository);

$controllerTest = new TController($taskService, $userService);
//$controllerTest->getTask(1);
$controllerTest->listTasks();

