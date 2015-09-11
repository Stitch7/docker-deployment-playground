<?php

namespace App\Http\Controllers;

use App\BillingDetails;

class BillingDetailsController extends Controller
{
    public function show($customerId)
    {
        return BillingDetails::where('customer_id',$customerId)->firstOrFail();
    }

    public function store()
    {

        // add billingdetails for given customer
        // check if new data is given --> same as contact-info = false / true

    }

    public function update()
    {
        // check if new data is given --> same as contact-info = false / true
    }

    public function delete()
    {

    }
}