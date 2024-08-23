<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentLine extends Model
{
  use HasFactory;
  protected $primaryKey = 'shipment_line_id';
  public $timestamps = false;
  protected $fillable = ['shipment_line_id', 'request_id', 'quantity', 'category_detail_id', 'description'];
  public function shippingRequest()
  {
    return $this->belongsTo(ShippingRequest::class, 'request_id');
  }

  public function categoryDetail()
  {
    return $this->belongsTo(CategoryDetail::class, 'category_detail_id');
  }
}
