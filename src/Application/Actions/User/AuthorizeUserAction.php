<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Domain\User\User;
use Psr\Http\Message\ResponseInterface as Response;

class AuthorizeUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $userId = $this->resolveArg('id');

        $data = $this->userRepository->findUser($userId);

        if (empty($data)) {
            $this->logger->info("User of id `${userId}` does not exist.");
            return $this->respondWithData("The user does not exist", 404);
        }

        $id = strval($data['id']);
        $name = strval($data['name']);
        $last_name = strval($data['last_name']);
        $is_active = $data['is_active'] == 1 ? true : false;

        $user = new User($id, $name, $last_name, $is_active);

        if (!$user->isActive()) {
            $this->logger->info("User of id `${userId}` is not active.");
            return $this->respondWithData('The user is not active', 401);
        }

        $this->logger->info("User of id `${userId}` is active.");
        return $this->respondWithData("The user is active", 200);
    }
}
