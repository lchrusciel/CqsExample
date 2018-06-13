<?php

declare(strict_types=1);

namespace App\Application\Handler;

use App\Application\Command\ChangeCustomerEmail;
use App\Domain\Customers;

final class ChangeCustomerEmailHandler
{
    /** @var Customers */
    private $customers;

    public function __construct(Customers $customers)
    {
        $this->customers = $customers;
    }

    public function __invoke(ChangeCustomerEmail $changeCustomerEmail)
    {
        $customer = $this->customers->getCustomerByEmail($changeCustomerEmail->oldEmail());

        $customer->changeEmail($changeCustomerEmail->newEmail());
    }
}
