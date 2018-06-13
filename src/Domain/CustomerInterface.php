<?php

declare(strict_types=1);

namespace App\Domain;

interface CustomerInterface
{
    public function email(): string;

    public function changeEmail(string $email): void;
}
