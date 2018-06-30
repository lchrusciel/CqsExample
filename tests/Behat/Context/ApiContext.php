<?php

declare(strict_types=1);

namespace App\Tests\Behat\Context;

use App\Domain\CustomerInterface;
use Behat\Behat\Context\Context;
use Symfony\Component\BrowserKit\Client;
use Symfony\Component\HttpFoundation\Response;
use Webmozart\Assert\Assert;

final class ApiContext implements Context
{
    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @When I register the :name customer with the :email email and the :password password
     */
    public function iRegisterTheCustomerWithTheEmailAndThePassword(string $name, string $email, string $password): void
    {
        $this->client->restart();
        $this->client->request('POST', 'customers/', [
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        Assert::eq($this->response()->getStatusCode(), Response::HTTP_CREATED);
    }

    /**
     * @When /^I change (my) email to "([^"]+)"$/
     */
    public function iChangeMyEmailTo(CustomerInterface $customer, string $newEmail): void
    {
        $this->client->restart();
        $this->client->request('PATCH', 'customers/' . $customer->id(), [
            'email' => $newEmail,
        ]);

        Assert::eq($this->response()->getStatusCode(), Response::HTTP_NO_CONTENT);
    }

    /**
     * @Then I should be able to log in as :email with :password password
     */
    public function iShouldBeAbleToLogInAsWithPassword(string $email, string $password): void
    {
        $this->client->restart();
        $this->client->request('GET', 'customers/' . $email);

        Assert::eq($this->response()->getStatusCode(), Response::HTTP_OK);
    }

    private function response(): Response
    {
        $response = $this->client->getResponse();

        \assert($response instanceof Response);

        return $response;
    }
}
