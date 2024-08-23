<?php

namespace App\Http\Controllers\my_controller;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\CreateInvoice;
use Illuminate\Support\Facades\Notification;

class AddInvoicesController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $columns = [
      1 => 'invoice_id',
      2 => 'request_id',
      3 => 'sender_name',
      4 => 'amount',
      5 => 'invoice_date',
      6 => 'payer',
    ];
    $search = [];

    $totalData = Invoice::count();

    $totalFiltered = $totalData;

    $limit = $request->input('length');
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    if (empty($request->input('search.value'))) {
      $users = Invoice::offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();
    } else {
      $search = $request->input('search.value');

      $users = Invoice::where('invoice_id', 'LIKE', "%{$search}%")
        ->orWhere('request_id', 'LIKE', "%{$search}%")
        ->orWhere('payer', 'LIKE', "%{$search}%")
        ->offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();

      $totalFiltered = Invoice::where('invoice_id', 'LIKE', "%{$search}%")
        ->orWhere('request_id', 'LIKE', "%{$search}%")
        ->orWhere('payer', 'LIKE', "%{$search}%")
        ->count();
    }

    $data = [];

    if (!empty($users)) {
      // providing a dummy id instead of database ids
      $ids = $start;

      foreach ($users as $user) {
        $nestedData['id'] = (string) $user->invoice_id;
        $nestedData['request_id'] = $user->request_id;
        $nestedData['sender_name'] = $user->shippingRequest->sender->first_name;
        $nestedData['amount'] = $user->amount;

        $nestedData['invoice_date'] = $user->invoice_date;
        $nestedData['payer'] = $user->payer;

        $data[] = $nestedData;
      }
    }
    if ($data) {
      return response()->json([
        'draw' => intval($request->input('draw')),
        'recordsTotal' => intval($totalData),
        'recordsFiltered' => intval($totalFiltered),
        'code' => 200,
        'data' => $data,
      ]);
    } else {
      return response()->json([
        'message' => 'Internal Server Error',
        'code' => 500,
        'data' => [],
      ]);
    }
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $invoices = Invoice::create([
      'invoice_id' => $request->invoice_id,
      'request_id' => $request->request_id,
      'invoice_date' => $request->invoice_date,
      'due_date' => $request->due_date,
      'amount' => $request->amount,
      'payer' => $request->payer,
    ]);
    $sender_email=$invoices->shippingRequest->sender->email;
    $reciver_email=$invoices->shippingRequest->receiver->email;
    $emails = User::whereIn('email', [$sender_email, $reciver_email])->get();
    if($invoices)
    {
      if($emails){
        $title='فاتورة';
        $p="فاتورة شحن الطرد انقر لمعرفة التفاصيل ";
        $link="invoice-show";
        $photo= "invoice.jpg";
        Notification::sendNow($emails, new CreateInvoice($invoices->id, $title, $p,$photo, $link));
      }
        return response()->json(['message' => 'انشئت'], 200);
    } else {
          return response()->json(['message' => 'خطأ'], 401);
    }


  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
