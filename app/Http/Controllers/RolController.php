<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
use DB;

class RolController extends Controller
{
    public function index(Request $request)
    {
        if($request){

            $query=trim($request->get('searchText'));
            $roles=DB::table('roles')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(3);
            return view('seguridad.roles.index',["roles"=>$roles,"searchText"=>$query]);
            //return $roles;
        }

    }
}
