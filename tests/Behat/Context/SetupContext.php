<?php

declare(strict_types=1);

namespace App\Tests\Behat\Context;

use App\Application\Command\RegisterCustomer;
use Behat\Behat\Context\Context;
use Symfony\Component\Messenger\MessageBusInterface;

final class SetupContext implements Context
{
    /** @var MessageBusInterface */
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @Given I registered as :name with the :email email and the :password password
     */
    public function iRegisteredAsWithTheEmailAndThePassword(string $name, string $email, string $password): void
    {
        $this->messageBus->dispatch(new RegisterCustomer($name, $email, $password));
    }
}
