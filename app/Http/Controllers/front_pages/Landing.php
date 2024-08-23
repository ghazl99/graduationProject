<?php

namespace App\Http\Controllers\front_pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\CreateCategory;
use Illuminate\Support\Facades\Notification;

class Landing extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'front'];

    return view('content.front-pages.landing-page', ['pageConfigs' => $pageConfigs]);
  }
}
