<?php

declare(strict_types=1);

namespace spec\App\Application\Command;

use PhpSpec\ObjectBehavior;

final class ChangeCustomerEmailSpec extends ObjectBehavior
{
    function it_represents_immutable_intention_of_changing_customers_email(): void
    {
        $this->beConstructedWith('rick@morty.com', 'rick@sanchez.com');

        $this->oldEmail()->shouldReturn('rick@morty.com');
        $this->newEmail()->shouldReturn('rick@sanchez.com');
    }
}
