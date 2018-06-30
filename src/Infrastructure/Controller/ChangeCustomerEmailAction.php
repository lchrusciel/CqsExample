<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use App\Application\Command\ChangeCustomerEmail;
use App\Domain\Customers;
use App\Request\ChangeCustomerEmailRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;

final class ChangeCustomerEmailAction
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

    public function __invoke(Request $request): Response
    {
        $customer = $this->customers->get($request->attributes->getInt('id'));
        $changeCustomerEmailRequest = new ChangeCustomerEmailRequest($customer, $request->request->get('email'));

        if ($changeCustomerEmailRequest->isValid()) {
            $this->messageBus->dispatch(new ChangeCustomerEmail(
                $customer->email(),
                $request->request->get('email')
            ));

            return new JsonResponse('', Response::HTTP_NO_CONTENT);
        }

        return new JsonResponse('Wrong email', Response::HTTP_BAD_REQUEST);
    }
}
