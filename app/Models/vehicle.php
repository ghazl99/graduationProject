<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
  use HasFactory;
  protected $fillable = ['vin', 'model', 'make_year', 'color', 'license_plate', 'height', 'car_length', 'status'];
}
