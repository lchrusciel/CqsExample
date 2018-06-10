<?php

declare(strict_types=1);

namespace spec\App\Application\Command;

use App\Application\Command\RegisterCustomer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

final class RegisterCustomerSpec extends ObjectBehavior
{
    function it_represents_immutable_intention_of_registering_customer(): void
    {
        $this->beConstructedWith('Rick Sanchez','rick@morty.com', 'birdperson');

        $this->name()->shouldReturn('Rick Sanchez');
        $this->email()->shouldReturn('rick@morty.com');
        $this->password()->shouldReturn('birdperson');
    }
}
