<?php

declare(strict_types=1);

namespace App\Tests\Behat\Context;

use App\Domain\Customers;
use Behat\Behat\Context\Context;

final class TransformContext implements Context
{
    /** @var Customers */
    private $customers;

    public function __construct(Customers $customers)
    {
        $this->customers = $customers;
    }

    /**
     * @Transform /^my email$/
     */
    public function getLatestCustomer(): string
    {
        $customer = $this->customers->getLatestCustomer();

        return $customer->email();
    }
}
