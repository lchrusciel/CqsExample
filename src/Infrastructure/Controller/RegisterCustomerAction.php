<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use App\Application\Command\RegisterCustomer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;

final class RegisterCustomerAction
{
    /** @var MessageBusInterface */
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function __invoke(Request $request): Response
    {
        $this->messageBus->dispatch(new RegisterCustomer(
            $request->request->get('name'),
            $request->request->get('email'),
            $request->request->get('password')
        ));

        return new JsonResponse('', Response::HTTP_CREATED);
    }
}
