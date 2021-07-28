<?php

declare(strict_types=1);

use App\Domain\User\UserRepository;
use App\Infrastructure\User\MySqlUserRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its mysql implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(MySqlUserRepository::class),
    ]);
};
