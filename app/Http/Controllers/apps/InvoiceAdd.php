<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\ShippingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Support\Str;
class InvoiceAdd extends Controller
{
  public function index(Request $request)
  {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    // Generate a unique invoice_id with 6 characters (mix of letters and digits)
    $uniqueId = '';

    for ($i = 0; $i < 6; $i++) {
      $uniqueId .= $characters[rand(0, strlen($characters) - 1)];
    }

    while (Invoice::where('invoice_id', $uniqueId)->exists()) {
      $uniqueId = '';

      for ($i = 0; $i < 6; $i++) {
        $uniqueId .= $characters[rand(0, strlen($characters) - 1)];
      }
    }
    $uniqueId = (string) $uniqueId;
    if ($request) {
      $shipment = ShippingRequest::find($request->id);
      $lines = $shipment->shipmentLines;
      $total = $lines->sum(function ($line) {
        return $line->categoryDetail->weight * $line->quantity * $line->categoryDetail->price;
      });
    }

    return view('content.apps.app-invoice-add', compact('shipment', 'uniqueId', 'lines', 'total'));
  }
}
