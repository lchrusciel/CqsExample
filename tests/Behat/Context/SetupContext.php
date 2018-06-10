<?php

declare(strict_types=1);

namespace App\Tests\Behat\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;

final class SetupContext implements Context
{
    /**
     * @Given I registered as :name with the :email email and the :password password
     */
    public function iRegisteredAsWithTheEmailAndThePassword(string $name, string $email, string $password): void
    {
        throw new PendingException();
    }
}
