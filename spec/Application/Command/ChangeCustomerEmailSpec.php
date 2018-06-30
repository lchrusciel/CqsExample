<?php

declare(strict_types=1);

namespace spec\App\Application\Command;

use App\Application\Exception\MalformedEmailException;
use PhpSpec\ObjectBehavior;

final class ChangeCustomerEmailSpec extends ObjectBehavior
{
    function it_represents_immutable_intention_of_changing_customers_email(): void
    {
        $this->beConstructedWith('rick@morty.com', 'rick@sanchez.com');

        $this->oldEmail()->shouldReturn('rick@morty.com');
        $this->newEmail()->shouldReturn('rick@sanchez.com');
    }

    function it_does_not_allow_to_change_email_to_wrong_value(): void
    {
        $this->beConstructedWith('rick@morty.com', 'rick');
        $this->shouldThrow(MalformedEmailException::class)->duringInstantiation();
    }
}
