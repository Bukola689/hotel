<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Resources\CustomerResource;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Repository\Admin\Customer\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    private $customer;

    public function __construct(CustomerRepository $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')->get();

        return CustomerResource::Collection($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
     
        $data = $request->all();

        $this->customer->saveCustomer($request, $data);

        return response()->json([
            'message' => 'Customer Saved Successfully !',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {  
      
        $data = $request->all();

        $this->customer->updateCustomer($request, $customer,$data);

        return response()->json([
            'message' => 'Customer updated Successfully !',
            'customer' => $customer
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $this->customer->removeCustomer($customer);

        return response()->json([
            'status' => 'Customer Removed Successfully',
            'customer' => $customer
        ]);
    }

    public function searchCustomer($search)
    {
        $customer = Customer::where('name', 'LIKE', '%' .$search. '%')->get();

        return response()->json([
            'customer' => $customer
        ]);
    }
}
