<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\ShippingRequest;
use App\Models\vehicle;
use Illuminate\Http\Request;

class LogisticsDashboard extends Controller
{
  public function index()
  {
    $a = Address::all();
    $v = vehicle::all();
    $s = ShippingRequest::all();
    return view('content.apps.app-logistics-dashboard', compact('a', 'v', 's'));
  }
}
