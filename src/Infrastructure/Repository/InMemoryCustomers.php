<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Customer;
use App\Domain\Customers;
use Webmozart\Assert\Assert;

final class InMemoryCustomers implements Customers
{
    /** @var array|Customer[] */
    private $customers;

    public function getCustomerByEmail(string $customerEmail): Customer
    {
        $customers = array_filter($this->customers, function (Customer $customer) use ($customerEmail): bool {
            return $customerEmail === $customer->email();
        });

        Assert::notEmpty($customers);
        Assert::isInstanceOf($customers[0], Customer::class);

        return $customers[0];
    }

    public function add(Customer $customer): void
    {
        $this->customers[] = $customer;
    }
}
