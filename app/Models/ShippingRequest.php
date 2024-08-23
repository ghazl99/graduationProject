<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingRequest extends Model
{
  use HasFactory;
  protected $fillable = [
    'request_id',
    'sender_customer_id',
    'receiver_customer_id',
    'shipping_delivery',
    'destination_id',
    'source_id'
  ];
  public $timestamps = false;
  protected $primaryKey = 'request_id';

  public function source()
  {
    return $this->belongsTo(Address::class, 'source_id');
  }
  public function destination()
  {
    return $this->belongsTo(Address::class, 'destination_id');
  }
  public function sender()
  {
    return $this->belongsTo(Customer::class, 'sender_customer_id');
  }

  public function receiver()
  {
    return $this->belongsTo(Customer::class, 'receiver_customer_id');
  }

  public function shipmentLines()
  {
    return $this->hasMany(ShipmentLine::class, 'request_id');
  }

  public function invoice()
  {
    return $this->hasOne(Invoice::class, 'request_id');
  }
}
