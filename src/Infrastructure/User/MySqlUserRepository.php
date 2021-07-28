<?php

declare(strict_types=1);

namespace App\Infrastructure\User;

use App\Domain\User\UserRepository;
use PDO;

class MySqlUserRepository implements UserRepository
{

    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * {@inheritdoc}
     */
    public function findUser(string $id): array
    {
        $query = "SELECT * FROM user u WHERE u.id = :id";
        $sth = $this->connection->prepare($query);
        $sth->bindParam(':id', $id);
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);

        $user = array_key_exists(0, $data) ? $data[0] : [];

        return $user;
    }
}
