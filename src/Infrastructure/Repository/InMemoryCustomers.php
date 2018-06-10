<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Customer;
use App\Domain\Customers;

final class InMemoryCustomers implements Customers
{
    /** @var array|Customer[] */
    private $customers;

    public function getCustomerByEmail(string $customerEmail): Customer
    {
        return array_filter($this->customers, function (Customer $customer) use ($customerEmail): bool {
            return $customerEmail === $customer->email();
        })[0];
    }

    public function add(Customer $customer): void
    {
        $this->customers[] = $customer;
    }
}
