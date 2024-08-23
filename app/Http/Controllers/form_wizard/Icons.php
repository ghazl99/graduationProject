<?php

namespace App\Http\Controllers\form_wizard;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Category;
use App\Models\CategoryDetail;
use Illuminate\Http\Request;
use App\Models\ShipmentCategory;

class Icons extends Controller
{
  public function index()
  {
    $categories = ShipmentCategory::all();
    $addresses = Address::all();
    return view('content.form-wizard.form-wizard-icons', compact('categories', 'addresses'));
  }

  public function getCategories()
  {
    $categories = ShipmentCategory::all();

    return response()->json($categories);
  }

  public function getCategoryPrice(Request $request)
  {
    $categoryId = $request->categoryName;

    $categoryName = CategoryDetail::where('type', $categoryId)->first();
    return response()->json([
      'price' => $categoryName->price,
      'weight' => $categoryName->weight,
    ]);
  }
}
