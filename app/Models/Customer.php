<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  use HasFactory;
  protected $primaryKey = 'id';

  protected $fillable = [
    'id',
    'national_id',
    'first_name',
    'middle_name',
    'last_name',
    'address',
    'phone',
    'email',
    'date_created',
  ];
  protected $dates = ['date_created'];
  // public function senderShippingRequests()
  // {
  //   return $this->hasMany(ShippingRequest::class, 'sender_customer_id');
  // }

  // public function receiverShippingRequests()
  // {
  //   return $this->hasMany(ShippingRequest::class, 'receiver_customer_id');
  // }

  // public function invoices()
  // {
  //   return $this->hasMany(Invoice::class, 'sender_customer_id')->orWhere('receiver_customer_id', $this->id);
  // }
}
