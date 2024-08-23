<?php

namespace App\Http\Controllers\apps;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserList extends Controller
{
  public function index()
  { $users = User::all();
    $userCount = $users->count();
    $verified = User::whereNotNull( 'email_verified_at' )
    ->get()
    ->count();
    $notVerified = User::whereNull( 'email_verified_at' )
    ->get()
    ->count();
    $usersUnique = $users->unique( [ 'email' ] );
    $userDuplicates = $users->diff( $usersUnique )->count();
    $roles = Role::all();
    return view('content.apps.app-user-list', [
      'totalUser' => $userCount,
      'verified' => $verified,
      'notVerified' => $notVerified,
      'userDuplicates' => $userDuplicates,
      'roles'=>$roles
  ] );
  }
}
