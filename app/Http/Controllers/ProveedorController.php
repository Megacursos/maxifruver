<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Proveedor;
use Illuminate\Support\Facades\Redirect;
use DB;

class ProveedorController extends Controller
{
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $proveedores=DB::table('proveedores')
            ->where('nombre','LIKE','%'.$query.'%')
            ->orwhere('num_documento','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(5);

            return view('compras.proveedor.index',["proveedores"=>$proveedores,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("compras.proveedor.create");
    }
    public function store (Request $request)
    {
        $proveedor= new Proveedor();
        $proveedor->nombre = $request->get('nombre');
        $proveedor->tipo_documento = $request->get('tipo_documento');
        $proveedor->num_documento = $request->get('num_documento');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->email = $request->get('email');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->save();
        return Redirect::to('compras/proveedor');

    }
    public function show($id)
    {
        return view("compras/proveedor.show",["proveedor"=>Proveedor::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("compras/proveedor.edit",["proveedor"=>Proveedor::findOrFail($id)]);
    }

    public function update(Request $request)
    {
        $proveedor= Proveedor::findOrFail($request->get('id_proveedor'));
        $proveedor->nombre = $request->get('nombre');
        $proveedor->tipo_documento = $request->get('tipo_documento');
        $proveedor->num_documento = $request->get('num_documento');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->email = $request->get('email');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->save();

        return Redirect::to('compras/proveedor');
    }
    public function destroy($id)
    {
        $proveedor= Proveedor::findOrFail($request->id_proveedor);
         if($proveedor->condicion=="1"){
                $proveedor->condicion= '0';
                $proveedor->save();
                return Redirect::to("compras/proveedor");

           }else{

                $proveedor->condicion= '1';
                $proveedor->save();
                return Redirect::to("compras/proveedor");
            }
    }
}
