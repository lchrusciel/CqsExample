<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Customer;
use App\Domain\CustomerInterface;
use App\Domain\Customers;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Webmozart\Assert\Assert;

final class DatabaseCustomers implements Customers
{
    /** @var ObjectRepository */
    private $repository;
    /** @var ObjectManager */
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->repository = $manager->getRepository(Customer::class);
        $this->manager = $manager;
    }

    public function getCustomerByEmail(string $email): CustomerInterface
    {
        $customer = $this->repository->findOneBy(['email' => $email]);

        if (!$customer instanceof CustomerInterface) {
            throw new \InvalidArgumentException('Customer has not been found!');
        }

        return $customer;
    }

    public function getLatestCustomer(): CustomerInterface
    {
        $customers = $this->repository->findAll();

        Assert::notEmpty($customers);

        return end($customers);
    }

    public function add(CustomerInterface $customer): void
    {
        $this->manager->persist($customer);
        $this->save();
    }

    public function save(): void
    {
        $this->manager->flush();
    }

    public function get(int $id): CustomerInterface
    {
        $customer = $this->repository->find($id);

        if (!$customer instanceof CustomerInterface) {
            throw new \InvalidArgumentException('Customer has not been found!');
        }

        return $customer;
    }
}
