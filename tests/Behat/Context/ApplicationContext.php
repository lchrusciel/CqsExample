<?php

declare(strict_types=1);

namespace App\Tests\Behat\Context;

use App\Application\Command\RegisterCustomer;
use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Symfony\Component\Messenger\MessageBusInterface;

final class ApplicationContext implements Context
{
    /** @var MessageBusInterface */
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
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
        throw new PendingException();
    }
}
