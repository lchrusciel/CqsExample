<?php

declare(strict_types=1);

namespace App\Domain;

class Customer implements CustomerInterface
{
    /** @var int */
    private $id;
    /** @var string */
    private $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function changeEmail(string $email): void
    {
        $this->email = $email;
    }
}
