<?php

namespace App\Http\Controllers\my_controller;

use App\Http\Controllers\Controller;
use App\Models\CategoryDetail;
use App\Models\ShipmentCategory;
use Illuminate\Http\Request;

class CategoryDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      $columns = [
        1 => 'id',
        2 => 'category_id',
        3 =>'type',
        4 =>'weight',
        5 =>'price'
      ];
      $search = [];
      $totalData = CategoryDetail::count();


      $totalFiltered = $totalData;

      $limit = $request->input( 'length' );
      $start = $request->input( 'start' );
      $order = $columns[ $request->input( 'order.0.column' ) ];
      $dir = $request->input( 'order.0.dir' );

      if ( empty( $request->input( 'search.value' ) ) ) {
          $users = CategoryDetail::offset( $start )
          ->limit( $limit )
          ->orderBy( $order, $dir )
          ->get();
      } else {
          $search = $request->input( 'search.value' );

          $users = CategoryDetail::where( 'id', 'LIKE', "%{$search}%" )
          ->orWhere( 'type', 'LIKE', "%{$search}%" )
          ->orWhere( 'price', 'LIKE', "%{$search}%" )
          ->offset( $start )
          ->limit( $limit )
          ->orderBy( $order, $dir )
          ->get();

          $totalFiltered = CategoryDetail::where( 'id', 'LIKE', "%{$search}%" )
          ->orWhere( 'type', 'LIKE', "%{$search}%" )
          ->orWhere( 'price', 'LIKE', "%{$search}%" )
          ->count();
      }
      $data = [];
      if (!empty($users)) {
        // providing a dummy id instead of database ids
        // $ids = $start;

        foreach ($users as $d) {
          $nestedData['id'] = $d->id;
          $category=ShipmentCategory::select('category_name')->where('category_id',$d->category_id)->get();
          $nestedData['category_id'] = $category[0]->category_name;
          $nestedData['type'] = $d->type;
          $nestedData['weight'] = $d->weight;
          $nestedData['price'] = $d->price;
          $data[] = $nestedData;
        }
      }

      if ($data) {
        return response()->json([
          'draw' => intval($request->input('draw')),
          'recordsTotal' => intval( $totalData ),
          'recordsFiltered' => intval( $totalFiltered ),
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
        $categoryDetail=CategoryDetail::create($request->all());
        if ( $categoryDetail ) {
          // user updated
          return response()->json( [ 'message' => '  تم الإضافة بنجاح!' ], 200 );
      } else {
          return response()->json( [ 'message' => 'error' ], 401 );
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
    public function edit( $id)
    {
      $products = CategoryDetail::where('id', $id)->first();
      return response()->json($products);    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
      $category = CategoryDetail::findOrFail( $id );
      // Update name
      $category->update($request->all());

      if ( $category ) {
          return response()->json( [ 'message' => 'Updated' ], 200 );
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
      $users = CategoryDetail::where('id', $id)->delete();
    }
}
