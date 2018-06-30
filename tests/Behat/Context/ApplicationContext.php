<?php

declare(strict_types=1);

namespace App\Tests\Behat\Context;

use App\Application\Command\ChangeCustomerEmail;
use App\Application\Command\RegisterCustomer;
use App\Application\Exception\MalformedEmailException;
use App\Domain\CustomerInterface;
use App\Domain\Customers;
use Behat\Behat\Context\Context;
use Symfony\Component\Messenger\MessageBusInterface;

final class ApplicationContext implements Context
{
    /** @var MessageBusInterface */
    private $messageBus;
    /** @var Customers */
    private $customers;

    /** @var array|\Exception[] */
    private $caughtExceptions = [];

    public function __construct(MessageBusInterface $messageBus, Customers $customers)
    {
        $this->messageBus = $messageBus;
        $this->customers = $customers;
    }

    /**
     * @When I register the :name customer with the :email email and the :password password
     */
    public function iRegisterTheCustomerWithTheEmailAndThePassword(string $name, string $email, string $password): void
    {
        $this->messageBus->dispatch(new RegisterCustomer($name, $email, $password));
    }

    /**
     * @When /^I change (my) email to "([^"]+)"$/
     */
    public function iChangeMyEmailTo(CustomerInterface $customer, string $newEmail): void
    {
        $this->messageBus->dispatch(new ChangeCustomerEmail($customer->email(), $newEmail));
    }

    /**
     * @When /^I try to change (my) email to "([^"]+)"$/
     */
    public function iTryToChangeMyEmailTo(CustomerInterface $customer, string $newEmail): void
    {
        try {
            $this->messageBus->dispatch(new ChangeCustomerEmail($customer->email(), $newEmail));
        } catch (MalformedEmailException $emailException) {
            $this->caughtExceptions[] = $emailException;
        }
    }

    /**
     * @Then I should be able to log in as :email with :password password
     */
    public function iShouldBeAbleToLogInAsWithPassword(string $email, string $password): void
    {
        $this->customers->getCustomerByEmail($email);
    }

    /**
     * @Then I should be notified that this email is wrong
     */
    public function iShouldBeNotifiedThatThisEmailIsWrong(): void
    {
        foreach ($this->caughtExceptions as $caughtException) {
            if ($caughtException instanceof MalformedEmailException) {
                return;
            }
        }

        throw new \InvalidArgumentException('No exception dispatched');
    }
}
