<?php

namespace App\Http\Controllers\front_pages;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Invoices extends Controller
{
    public function show($id){
      $pageConfigs = ['myLayout' => 'front'];
      $notification_id= DB::table('notifications')->where('data->id',$id)->pluck('id');
      DB::table('notifications')->whereIn('id', $notification_id)->where('notifiable_id', auth()->user()->id)
      ->update(['read_at'=>now()]);
      $invoice = Invoice::with('shippingRequest.sender','shippingRequest.shipmentLines','shippingRequest.receiver','shippingRequest.source','shippingRequest.destination')->find($id);
      return view('content.front-pages.invoiceNotification', ['pageConfigs' => $pageConfigs],compact('invoice'));
    }
}
