<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['customer_id','type','language'];

    public function contactDetails()
    {
        return $this->hasOne(ContactDetails::class);
    }

    public function billingDetails()
    {
        return $this->hasOne(BillingDetails::class);
    }
}