<?php

namespace App\Http\Controllers\apps;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CategoryDetail;
use App\Models\ShipmentCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class EcommerceProductCategory extends Controller
{
  public function index()
  {
    $categories = ShipmentCategory::orderBy('category_id', 'DESC')->get();
    return view('content.apps.app-ecommerce-category-list', \compact('categories'));
    
  }

  public function getCategoryDetails($categoryId)
  {
    $details = CategoryDetail::where('category_id', $categoryId)->get();
    return response()->json($details);
  }
}
