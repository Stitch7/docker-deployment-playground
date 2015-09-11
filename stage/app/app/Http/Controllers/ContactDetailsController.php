<?php

namespace App\Http\Controllers;


use App\ContactDetails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactDetailsController extends Controller
{
    public function show($customerId)
    {
        return ContactDetails::where('customer_id',$customerId)->firstOrFail();
    }

    public function store(Request $request, $customerId)
    {
        $this->validate($request,[
            'salutation' => 'required|in:M,F',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company' => 'string',
            'care_of' => 'string',
            'street' => 'required|string',
            'zip' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|in:'.implode(',',array_keys(config('countries'))),
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);
        $contactDetailsData = array_merge($request->all(),['customer_id' => $customerId]);
        $contactDetails = ContactDetails::create($contactDetailsData);
        return new JsonResponse($contactDetails,201);
    }

    public function update(Request $request, $customerId)
    {
        $this->validate($request,[
            'salutation' => 'required|in:M,F',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company' => 'string',
            'care_of' => 'string',
            'street' => 'required|string',
            'zip' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|in:'.implode(',',array_keys(config('countries'))),
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);

        $contactDetails = ContactDetails::where('customer_id',$customerId)->firstOrFail();
        $contactDetailsData = array_merge($request->all(),['customer_id' => $customerId]);
        $contactDetails->update($contactDetailsData);
        return new JsonResponse($contactDetails,202);
    }
}