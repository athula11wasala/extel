<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{
    /**
     * {@inheritDoc}
     */
    public function updateCustomer($customerId, $data)
    {
        $customer = Customer::find($customerId);
        if ($customer) {
            $customer->first_name = $data["first_name"];
            $customer->last_name = $data["last_name"];
            $customer->age = $data["age"];
            return $customer->save();
        }
        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function createCustomer($data)
    {
        return Customer::create($data);
    }

    /**
     * {@inheritDoc}
     */
    public function getCustomers($customerId = null)
    {
        $customer = Customer::select(
            "id",
            "email",
            "first_name",
            "last_name",
            "age",
            "dob"
        );

        if (!empty($customerId)) {
            $customer->where("id", $customerId);
        }

        return $customer->get();
    }

    /**
     * {@inheritDoc}
     */
    public function deleteCustomer($customerId)
    {
        $customer = Customer::find($customerId);
        if ($customer) {
            return $customer->delete();
        }
        return false;
    }
}
