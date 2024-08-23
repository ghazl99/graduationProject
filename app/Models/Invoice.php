<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  use HasFactory;
  protected $fillable = ['invoice_id', 'request_id', 'invoice_date', 'due_date', 'amount', 'payer'];

  public function shippingRequest()
  {
    return $this->belongsTo(shippingRequest::class, 'request_id');
  }
}
