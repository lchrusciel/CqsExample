<?php

declare(strict_types=1);

namespace App\Application\Command;

use App\Application\Exception\MalformedEmailException;

final class ChangeCustomerEmail
{
    /** @var string */
    private $oldEmail;
    /** @var string */
    private $newEmail;

    public function __construct(string $oldEmail, string $newEmail)
    {
        if (false === filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
            throw new MalformedEmailException();
        }

        $this->oldEmail = $oldEmail;
        $this->newEmail = $newEmail;
    }

    public function oldEmail(): string
    {
        return $this->oldEmail;
    }

    public function newEmail(): string
    {
        return $this->newEmail;
    }
}
