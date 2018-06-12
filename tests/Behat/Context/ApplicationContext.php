<?php

declare(strict_types=1);

namespace App\Tests\Behat\Context;

use App\Application\Command\RegisterCustomer;
use App\Domain\Customers;
use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Symfony\Component\Messenger\MessageBusInterface;

final class ApplicationContext implements Context
{
    /** @var MessageBusInterface */
    private $messageBus;
    /** @var Customers */
    private $customers;

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
        $this->customers->getCustomerByEmail($email);
    }
}
