<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\CustomerInterface;
use App\Domain\Customers;
use Webmozart\Assert\Assert;

final class InMemoryCustomers implements Customers
{
    /** @var array|CustomerInterface[] */
    private $customers;

    public function getCustomerByEmail(string $customerEmail): CustomerInterface
    {
        $customers = array_filter($this->customers, function (CustomerInterface $customer) use ($customerEmail): bool {
            return $customerEmail === $customer->email();
        });

        Assert::notEmpty($customers);

        return $customers[0];
    }

    public function getLatestCustomer(): CustomerInterface
    {
        Assert::notEmpty($this->customers);

        return end($this->customers);
    }

    public function add(CustomerInterface $customer): void
    {
        $this->customers[] = $customer;
    }
}
