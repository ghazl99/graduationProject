<?php

namespace App\Http\Controllers\my_controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $columns = [
      1 => 'id',
      2 => 'name',
    ];

    $search = [];

    $totalData = Permission::count();

    $totalFiltered = $totalData;

    $limit = $request->input('length');
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    if (empty($request->input('search.value'))) {
      $users = Permission::offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();
    } else {
      $search = $request->input('search.value');

      $users = Permission::where('id', 'LIKE', "%{$search}%")
        ->orWhere('name', 'LIKE', "%{$search}%")

        ->offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();

      $totalFiltered = Permission::where('id', 'LIKE', "%{$search}%")
        ->orWhere('name', 'LIKE', "%{$search}%")

        ->count();
    }

    $data = [];

    if (!empty($users)) {
      // providing a dummy id instead of database ids
      $ids = $start;

      foreach ($users as $user) {
        $nestedData['id'] = $user->id;
        $nestedData['name'] = $user->name;
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
    $PermissionName = $request->modalPermissionName;

    // update the value
    if ($request->modalPermissionName) {
      $Permissions = Permission::Create(['name' => $request->modalPermissionName, 'guard_name' => 'web']);
      return response()->json(['message' => 'Created']);
    } else {
      return response()->json(['message' => 'oooooppo']);
    }

    //     // user updated
    //     return response()->json( 'Updated' );
    // } else {
    //     // create new one if email is unique
    //     $PermissionName = Permission::where( 'name', $request->name )->first();

    //     if ( empty( $PermissionName ) ) {
    //         $Permissions = Permission::updateOrCreate( [ 'id' => $PermissionID ], [ 'name' => $request->name, 'guard_name' => 'web' ] );

    //         // user created
    //         return response()->json( 'Created' );
    //     } else {
    //         // user already exist
    //         return response()->json( [ 'message' => 'already exits' ], 422 );
    // }
    // }
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
    $permission = Permission::where('id', $id)->first();
    return response()->json($permission);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $permission = Permission::findOrFail($id);

    // Update name
    $permission->name = $request->editPermissionName;

    // Save
    if ($permission->save()) {
      return response()->json(['message' => 'Updated'], 200);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $users = Permission::where('id', $id)->delete();
  }
}
