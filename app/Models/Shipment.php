<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
  use HasFactory;
  protected $fillable = ['driver_id', 'vehicle_id', 'shipping_request_id'];
  public function driver()
  {
    return $this->belongsTo(User::class, 'driver_id');
  }

  public function vehicle()
  {
    return $this->belongsTo(vehicle::class, 'vehicle_id');
  }

  public function request()
  {
    return $this->belongsTo(ShippingRequest::class, 'shipping_request_id');
  }
}
