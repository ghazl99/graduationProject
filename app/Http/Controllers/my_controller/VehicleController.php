<?php

namespace App\Http\Controllers\my_controller;

use App\Http\Controllers\Controller;
use App\Models\vehicle;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $columns = [
      1 => 'id',
      2 => 'license_plate',
      3 => 'vin',
      4 => 'model',
      5 => 'color',
      6 => 'height',
      7 => 'car_length',
      6 => 'make_year',
      9 => 'status',
    ];
    $search = [];

    $totalData = vehicle::count();

    $totalFiltered = $totalData;

    $limit = $request->input('length');
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    if (empty($request->input('search.value'))) {
      $users = vehicle::offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();
    } else {
      $search = $request->input('search.value');

      $users = vehicle::where('id', 'LIKE', "%{$search}%")
        ->orWhere('license_plate', 'LIKE', "%{$search}%")
        ->orWhere('vin', 'LIKE', "%{$search}%")
        ->offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();

      $totalFiltered = vehicle::where('id', 'LIKE', "%{$search}%")
        ->orWhere('license_plate', 'LIKE', "%{$search}%")
        ->orWhere('vin', 'LIKE', "%{$search}%")
        ->count();
    }

    $data = [];

    if (!empty($users)) {
      // providing a dummy id instead of database ids
      $ids = $start;

      foreach ($users as $user) {
        $nestedData['id'] = $user->id;
        $nestedData['license_plate'] = $user->license_plate;
        $nestedData['vin'] = $user->vin;
        $nestedData['model'] = $user->model;

        $nestedData['color'] = $user->color;
        $nestedData['car_length'] = $user->car_length;
        $nestedData['height'] = $user->height;
        $nestedData['make_year'] = $user->make_year;
        $nestedData['status'] = $user->status;

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
    $this->validate($request, [
      'model' => 'required',
      'make_year' => 'required',
      'vin' => 'required|unique:vehicles',
      'color' => 'required',
      'car_length' => 'required|integer',
      'license_plate' => 'required',
      'height' => 'required',
      'status' => 'required',
    ]);
    $vehicle = new vehicle();

    // Assign model attributes
    $vehicle->model = $request->model;
    $vehicle->make_year = $request->make_year;
    $vehicle->vin = $request->vin;
    $vehicle->color = $request->color;
    $vehicle->car_length = $request->car_length;
    $vehicle->license_plate = $request->license_plate;
    $vehicle->height = $request->height;
    $vehicle->status = $request->status;

    if ($vehicle->save()) {
      return response()->json([
        'success' => true,
        'message' => 'انشات المركبة بنجاح',
      ]);
    } else {
      return response()->json([
        'success' => false,
        'message' => 'لم تنشا المركبة',
      ]);
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
