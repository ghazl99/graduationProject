<?php

namespace App\Http\Controllers\my_controller;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use  App\Http\Controllers\Controller;
use function Laravel\Prompts\select;

class RoleController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        //
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        $roles = Role::Create( [ 'name' => $request->modalRoleName, 'guard_name' => 'web' ] )->givePermissionTo( $request->permission_role );
        if ( $roles )
        // user updated
        return response()->json( [ 'message' => 'created' ] );
        else
        return response()->json( [ 'message' => 'error' ] );
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        $roles = Role::where( 'id', $id )->first();
        if ( $roles->permissions ) {
            return response()->json( $roles );
        }
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        $role = Role::findOrFail( $id );
        // Update name
        $role->name = $request->editRoleName;
        $role->syncPermissions( $request->editCheckbox );
        // Save
        if ( $role->save() ) {
            return response()->json( [ 'message' => 'Updated' ], 200 );
        }
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy(string  $id ) {
      $roles = Role::where( 'id', $id )->delete();
    }
}
