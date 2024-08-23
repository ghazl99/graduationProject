<?php

namespace App\Http\Controllers\apps;

use Illuminate\Http\Request;
use App\Models\ShipmentCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class EcommerceProductList extends Controller
{
  public function index()
  {
    $categories = ShipmentCategory::all();
    return view('content.apps.app-ecommerce-product-list',
    [ 'categories' =>$categories,
     ] );
     

  }
}
