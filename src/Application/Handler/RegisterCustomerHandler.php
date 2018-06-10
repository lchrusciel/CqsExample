<?php

declare(strict_types=1);

namespace App\Application\Handler;

use App\Application\Command\RegisterCustomer;
use App\Domain\Customer;
use App\Domain\Customers;

final class RegisterCustomerHandler
{
    /** @var Customers */
    private $customers;

    public function __construct(Customers $customers)
    {
        $this->customers = $customers;
    }

    public function __invoke(RegisterCustomer $registerCustomer): void
    {
        $this->customers->add(new Customer($registerCustomer->email()));
    }
}
