<?php

declare(strict_types=1);

namespace App\Request;

use App\Application\Command\ChangeCustomerEmail;
use App\Domain\CustomerInterface;

final class ChangeCustomerEmailRequest
{
    /** @var string */
    private $oldEmail;
    /** @var string */
    private $newEmail;

    public function __construct(CustomerInterface $customer, string $newEmail)
    {
        $this->oldEmail = $customer->email();
        $this->newEmail = $newEmail;
    }

    public function isValid(): bool
    {
        return false !== filter_var($this->newEmail, FILTER_VALIDATE_EMAIL);
    }

    public function getCommand(): ChangeCustomerEmail
    {
        return new ChangeCustomerEmail($this->oldEmail, $this->newEmail);
    }
}
