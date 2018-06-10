<?php

declare(strict_types=1);

namespace App\Domain;

interface Customers
{
    public function getCustomerByEmail(string $email): Customer;

    public function add(Customer $customer): void;
}
