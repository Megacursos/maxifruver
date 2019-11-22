<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\Redirect;
use DB;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $clientes=DB::table('clientes')
            ->where('nombre','LIKE','%'.$query.'%')
            ->orwhere('num_documento','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(5);
            return view('ventas.cliente.index',["clientes"=>$clientes,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("ventas.cliente.create");
    }
    public function store (Request $request)
    {
        $cliente=new Cliente;
        $cliente->nombre=$request->get('nombre');
        $cliente->tipo_documento=$request->get('tipo_documento');
        $cliente->num_documento=$request->get('num_documento');
        $cliente->direccion=$request->get('direccion');
        $cliente->telefono=$request->get('telefono');
        $cliente->email=$request->get('email');
        $cliente->save();
        return Redirect::to('ventas/cliente');

    }
    public function show($id)
    {
        return view("ventas.cliente.show",["clientes"=>Cliente::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("ventas.cliente.edit",["clientes"=>Cliente::findOrFail($id)]);
    }

    public function update(Request $request)
    {
        $cliente=Cliente::findOrFail($request->id);
        $cliente->nombre=$request->get('nombre');
        $cliente->tipo_documento=$request->get('tipo_documento');
        $cliente->num_documento=$request->get('num_documento');
        $cliente->direccion=$request->get('direccion');
        $cliente->telefono=$request->get('telefono');
        $cliente->email=$request->get('email');
        $cliente->update();
        return Redirect::to('ventas/cliente');
    }
     public function destroy(Request $request)
    {
        $cliente= Cliente::findOrFail($request->id);
         if($cliente->condicion=="1"){
                $cliente->condicion= '0';
                $cliente->save();
                return Redirect::to("ventas/cliente");
           }else{
                $cliente->condicion= '1';
                $cliente->save();
                return Redirect::to("ventas/cliente");
            }
    }
}
