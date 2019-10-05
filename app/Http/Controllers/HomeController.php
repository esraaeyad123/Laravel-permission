<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use App\User ;

use Spatie\Permission\Models\Role;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     //   $role=Role::create(['name'=>'delete']);10

//Permission::create(['name'=>'delete post']);
//$role=Role::findById(10) ;
      //$p=Permission::findById(10) ;
      //  $role->givePermissionTo($p);
     //auth()->user()->assignRole('delete');
return view('home');
    }
}
