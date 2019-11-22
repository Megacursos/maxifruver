<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query=trim($request->get('searchText'));
            $productos=DB::table('productos as p')
            ->join('categorias as c','p.idcategoria','=','c.id')
            ->select('p.id','p.idcategoria','p.nombre','p.precio_venta','p.codigo','p.stock','p.imagen','p.condicion','c.nombre as categoria')
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->orwhere('p.codigo','LIKE','%'.$query.'%')
            ->orderBy('p.id','desc')
            ->paginate(3);

            /*listar las categorias en ventana modal*/
            $categorias=DB::table('categorias')
            ->select('id','nombre','descripcion')
            ->where('condicion','=','1')->get();

            return view('productos.productos.index',["productos"=>$productos,"categorias"=>$categorias,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $categorias=DB::table('categorias')-> where('condicion','=','1')->get();
        return view("productos.productos.create",["categorias"=>$categorias]);
    }
    public function store (Request $request)
    {
        $producto= new Producto();
        $producto->idcategoria = $request->get('id');
        $producto->codigo = $request->get('codigo');
        $producto->nombre = $request->get('nombre');
        $producto->precio_venta = $request->get('precio_venta');
        $producto->stock = '0';
        $producto->condicion = '1';
        //Handle File Upload
        if($request->hasFile('imagen')){
        //Get filename with the extension
        $filenamewithExt = $request->file('imagen')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
        //Get just ext
        $extension = $request->file('imagen')->guessClientExtension();
        //FileName to store
        $fileNameToStore = time().'.'.$extension;
        //Upload Image
        $path = $request->file('imagen')->storeAs('public/img/productos',$fileNameToStore);
        } else{
            $fileNameToStore="noimagen.jpg";
        }
        $producto->imagen=$fileNameToStore;
        $producto->save();

        return Redirect::to('productos/productos');

    }

    public function show($id)
    {
        return view("productos.productos.show",["producto"=>Producto::findOrFail($id)]);
    }
    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        $categorias=DB::table('categorias')->where('condicion','=','1')->get();
        return view("productos.productos.edit",["producto"=>$producto,"categorias"=>$categorias]);
    }

    public function update(Request $request)
    {
        $producto= Producto::findOrFail($request->get('id_producto'));
        $producto->idcategoria = $request->get('id');
        $producto->codigo = $request->get('codigo');
        $producto->nombre = $request->get('nombre');
        $producto->precio_venta = $request->get('precio_venta');
        $producto->stock = '0';
        $producto->condicion = '1';
        //Handle File Upload
        if($request->hasFile('imagen')){
            /*si la imagen que subes es distinta a la que está por defecto
            entonces eliminaría la imagen anterior, eso es para evitar
            acumular imagenes en el servidor*/
          if($producto->imagen != 'noimagen.jpg'){
            Storage::delete('public/img/productos/'.$producto->imagen);
          }
            //Get filename with the extension
          $filenamewithExt = $request->file('imagen')->getClientOriginalName();
          //Get just filename
          $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
          //Get just ext
          $extension = $request->file('imagen')->guessClientExtension();
          //FileName to store
          $fileNameToStore = time().'.'.$extension;
          //Upload Image
          $path = $request->file('imagen')->storeAs('public/img/productos/',$fileNameToStore);
        } else {
            $fileNameToStore = $producto->imagen;
        }
        $producto->imagen=$fileNameToStore;
        $producto->save();

        return Redirect::to('productos/productos');
    }

    public function destroy(Request $request)
    {
        $producto= Producto::findOrFail($request->id_producto);
            if($producto->condicion=="1"){
                $producto->condicion= '0';
                $producto->save();
                return Redirect::to('productos/productos');
            } else{
                $producto->condicion= '1';
                $producto->save();
                return Redirect::to('productos/productos');
            }
    }

    public function listarPdf(){
        $productos = Producto::join('categorias','productos.idcategoria','=','categorias.id')
        ->select('productos.id','productos.idcategoria','productos.codigo','productos.nombre','categorias.nombre as nombre_categoria','productos.stock','productos.condicion')
        ->orderBy('productos.nombre', 'desc')->get();

        $cont=Producto::count();

        $pdf= \PDF::loadView('pdf.productospdf',['productos'=>$productos,'cont'=>$cont]);
        return $pdf->download('productos.pdf');
    }
}
