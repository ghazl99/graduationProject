<?php

namespace App\Http\Controllers\front_pages;

use Illuminate\Http\Request;
use App\Models\ShipmentCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class Categories extends Controller
{
  public function index()
  {
    $categories = ShipmentCategory::orderBy('category_id', 'DESC')->get();
    $pageConfigs = ['myLayout' => 'front'];
    return view('content.front-pages.categories', ['pageConfigs' => $pageConfigs, 'categories' => $categories]);
  }

  public function address()
  {
    $categories = ShipmentCategory::orderBy('category_id', 'DESC')->get();
    $pageConfigs = ['myLayout' => 'front'];
    return view('content.front-pages.address', ['pageConfigs' => $pageConfigs, 'categories' => $categories]);
  }
  public function address_center_a()
  {
    return view('content.front-pages.address_center.Aleppo');
  }
  public function address_center_h()
  {
    return view('content.front-pages.address_center.hama');
  }public function address_center_d()
  {
    return view('content.front-pages.address_center.damascus');
  }
  public function fletmap()
  {
    $categories = ShipmentCategory::orderBy('category_id', 'DESC')->get();
    $pageConfigs = ['myLayout' => 'front'];
    return view('content.front-pages.fletmap-page', ['pageConfigs' => $pageConfigs, 'categories' => $categories]);
  }

  public function show($id)
  {
    $notification_id = DB::table('notifications')
      ->where('data->id', $id)
      ->pluck('id');
    DB::table('notifications')
      ->whereIn('id', $notification_id)
      ->where('notifiable_id', auth()->user()->id)
      ->update(['read_at' => now()]);
    return redirect()->route('categories');
  }
  public function destroy($id)
  {
    $notification_id = DB::table('notifications')
      ->where('data->id', $id)
      ->pluck('id');
    DB::table('notifications')
      ->whereIn('id', $notification_id)
      ->where('notifiable_id', auth()->user()->id)
      ->delete();
  }
}
