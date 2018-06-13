<?php

declare(strict_types=1);

namespace App\Domain;

interface Customers
{
    public function getCustomerByEmail(string $email): CustomerInterface;

    public function add(CustomerInterface $customer): void;

    public function getLatestCustomer(): CustomerInterface;
}
