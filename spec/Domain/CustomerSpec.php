<?php

declare(strict_types=1);

namespace spec\App\Domain;

use App\Domain\Customer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

final class CustomerSpec extends ObjectBehavior
{
    function it_is_customer_class(): void
    {
        $this->beConstructedWith('rick@morty.com');

        $this->email()->shouldReturn('rick@morty.com');
    }

    function it_can_have_email_changed(): void
    {
        $this->beConstructedWith('rick@morty.com');

        $this->changeEmail('rick@sanchez.com');

        $this->email()->shouldReturn('rick@sanchez.com');
    }
}
