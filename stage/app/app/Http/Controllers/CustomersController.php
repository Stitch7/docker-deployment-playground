<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomersController extends Controller
{

    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        return Customer::with('contactDetails','billingDetails')->paginate($perPage);
    }

    public function show($customerId)
    {
        return Customer::with('contactDetails','billingDetails')->findOrFail($customerId);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'type' => 'required|in:P,B',
            'language' => 'required|in:'.implode(',',array_keys(config('languages'))),
        ]);
        /**
         * @TODO_: specify customer-id-generation
         */
        $customerId = str_random();
        $customerData = array_merge($request->input(),['customer_id' => $customerId]);
        $customer = Customer::create($customerData);
        return new JsonResponse($customer, 201);
    }

    public function update(Request $request, $customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $this->validate($request,[
            'type' => 'required|in:P,B',
            'language' => 'required|in:'.implode(',',array_keys(config('languages'))),
        ]);
        $customer->update($request->all());
        return new JsonResponse($customer, 202);
    }

    public function delete($customerId)
    {
        $customerToDelete = Customer::findOrFail($customerId);
        $customerToDelete->delete();
        return response('',204);
    }
}