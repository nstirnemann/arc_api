<?php

declare(strict_types=1);

namespace App\Domain\User;

use JsonSerializable;

class User implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var bool
     */
    private $isActive;

    /**
     * @param string|null  $id
     * @param string    $username
     * @param string    $firstName
     * @param string    $lastName
     * @param string    $isActive
     */
    public function __construct(?string $id, string $firstName, string $lastName,  bool $isActive)
    {
        $this->id = ucfirst($id);
        $this->firstName = ucfirst($firstName);
        $this->lastName = ucfirst($lastName);
        $this->isActive = $isActive;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'isActive' => $this->isActive,
        ];
    }
}
