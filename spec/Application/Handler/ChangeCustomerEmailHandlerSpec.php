<?php

declare(strict_types=1);

namespace spec\App\Application\Handler;

use App\Application\Command\ChangeCustomerEmail;
use App\Domain\CustomerInterface;
use App\Domain\Customers;
use PhpSpec\ObjectBehavior;

final class ChangeCustomerEmailHandlerSpec extends ObjectBehavior
{
    function let(Customers $customers): void
    {
        $this->beConstructedWith($customers);
    }

    function it_register_customer(Customers $customers, CustomerInterface $customer): void
    {
        $customers->getCustomerByEmail('rick@morty.com')->willReturn($customer);

        $customer->changeEmail('rick@sanchez.com')->shouldBeCalled();

        $customers->save()->shouldBeCalled();

        $this(new ChangeCustomerEmail('rick@morty.com', 'rick@sanchez.com'));
    }
}
