<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    protected $table = 'contact_details';

    protected $fillable = [
        'salutation','first_name','last_name','company','care_of','street','zip','country','city','phone','email',
        'customer_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}