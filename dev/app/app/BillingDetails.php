<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class BillingDetails extends Model
{
    protected $table = 'billing_details';

    protected $fillable = [
        'is_identical_to_contact_details','salutation','first_name','last_name','company','care_of','street','zip','city','country','phone','email'
    ];
    protected $casts = [
        'is_identical_to_contact_details' => 'boolean'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}