<?php

declare(strict_types=1);

namespace spec\App\Application\Handler;

use App\Application\Command\RegisterCustomer;
use App\Domain\Customer;
use App\Domain\Customers;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

final class RegisterCustomerHandlerSpec extends ObjectBehavior
{
    function let(Customers $customers): void
    {
        $this->beConstructedWith($customers);
    }

    function it_register_customer(Customers $customers): void
    {
        $customers->add(Argument::exact(new Customer('rick@morty.com')))->shouldBeCalled();

        $this(new RegisterCustomer('Rick Sanchez', 'rick@morty.com', 'birdperson'));
    }
}
