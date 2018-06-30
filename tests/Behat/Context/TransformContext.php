<?php

declare(strict_types=1);

namespace App\Tests\Behat\Context;

use App\Domain\CustomerInterface;
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
     * @Transform /^my$/
     */
    public function getLatestCustomer(): CustomerInterface
    {
        return $this->customers->getLatestCustomer();
    }
}
