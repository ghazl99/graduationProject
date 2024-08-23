<?php

namespace App\Http\Controllers\front_pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ShipmentCategory;

class ShippingpriceController extends Controller
{

  public function categoryDetail($id)
  {

    $pageConfigs = ['myLayout' => 'front'];
    $category_Detail=ShipmentCategory::with('categoryDetail')->find($id);
    return view('content.front-pages.shipping-price-page', ['pageConfigs' => $pageConfigs ,'id'=>$id,'category_Detail'=>$category_Detail]);
  }
}
