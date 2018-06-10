<?php

declare(strict_types=1);

namespace App\Domain;

final class Customer
{
    /** @var string */
    private $email;

    public function __construct(string $email)
    {
        $this->email = $email;
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
