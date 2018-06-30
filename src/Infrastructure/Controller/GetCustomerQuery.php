<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use App\Domain\Customers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class GetCustomerQuery
{
    /** @var Customers */
    private $customers;

    public function __construct(Customers $customers)
    {
        $this->customers = $customers;
    }

    public function __invoke(Request $request): Response
    {
        return new JsonResponse($this->customers->getCustomerByEmail($request->attributes->get('email')));
    }
}
