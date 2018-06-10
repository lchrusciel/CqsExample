<?php

declare(strict_types=1);

namespace App\Tests\Behat\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;

final class ApplicationContext implements Context
{
    /**
     * @When I register the :name customer with the :email email and the :password password
     */
    public function iRegisterTheCustomerWithTheEmailAndThePassword(string $name, string $email, string $password): void
    {
        throw new PendingException();
    }

    /**
     * @When I change my email to :email
     */
    public function iChangeMyEmailTo(string $email): void
    {
        throw new PendingException();
    }

    /**
     * @Then I should be able to log in as :email with :password password
     */
    public function iShouldBeAbleToLogInAsWithPassword(string $email, string $password): void
    {
        throw new PendingException();
    }
}
