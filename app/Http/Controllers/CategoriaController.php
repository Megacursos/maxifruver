<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use DB;


class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $categorias=DB::table('categorias')
            ->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(3);
            return view('productos.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("productos.categoria.create");
    }
    public function store (Request $request)
    {
        $categoria=new Categoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->condicion='1';
        $categoria->save();
        return Redirect::to('productos/categoria');

    }
    public function show($id)
    {
        return view("productos.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("productos.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }

    public function update(Request $request)
    {
        $categoria=Categoria::findOrFail($request->id_categoria);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->condicion= '1';
        $categoria->save();
        return Redirect::to('productos/categoria');
    }
    public function destroy(Request $request)
    {
        $categoria=Categoria::findOrFail($request->id_categoria);
        if($categoria->condicion=="1"){

                $categoria->condicion= '0';
                $categoria->save();
                return Redirect::to("productos/categoria");

        } else{

                $categoria->condicion= '1';
                $categoria->save();
                return Redirect::to("productos/categoria");

        }
    }
}
