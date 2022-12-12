<?php

namespace App\Repository\Admin\Customer;

use App\Models\Customer;
use Illuminate\Http\Request;

interface ICustomerRepository
{
    public function saveCustomer(Request $request, array $data);

    public function updateCustomer(Request $request, Customer $customer, array $data);

    public function removeCustomer(Customer $customer);
}