<?php

namespace App\Services;

use App\Repositories\CustomerRepository;

class CommonService
{
    private $customerRepository;

    /**
     * CommonService constructor.
     * @param CustomerRepository $customerRepository
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Create customer
     *
     */
    public function createCustomer($data)
    {
        return $this->customerRepository->createCustomer($data);
    }

    /**
     * Update customer
     */
    public function updateCustomer($customerId, $data)
    {
        return $this->customerRepository->updateCustomer(
            $customerId,
            $data
        );
    }

    /**
     * Get all customer
     */
    public function listCustomer()
    {
        return $this->customerRepository->getCustomers();
    }

    /**
     * get customer by customrId
     *
     */
    public function getCustoemr($id)
    {
        return $this->customerRepository->getCustomers($id);
    }

    /**
     * delete customer by customerId
     */
    public function deleteCustomer($id)
    {
        return $this->customerRepository->deleteCustomer($id);
    }
}
