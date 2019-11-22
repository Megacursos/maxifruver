<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        if($request){

            $query=trim($request->get('searchText'));
            $usuarios=DB::table('users')
            ->join('roles','users.idrol','=','roles.id')
            ->select('users.id','users.nombre','users.tipo_documento',
            'users.num_documento','users.direccion','users.telefono',
            'users.email','users.usuario','users.password',
            'users.condicion','users.idrol','users.imagen','roles.nombre as rol')
            ->where('users.nombre','LIKE','%'.$query.'%')
            ->orwhere('users.num_documento','LIKE','%'.$query.'%')
            ->orderBy('users.id','desc')
            ->paginate(3);

             /*listar los roles en ventana modal*/
            $roles=DB::table('roles')
            ->select('id','nombre','descripcion')
            ->where('condicion','=','1')->get();

            return view('seguridad.usuario.index',["usuarios"=>$usuarios,"roles"=>$roles,"searchText"=>$query]);

            //return $usuarios;
        }


    }
    public function create()
    {
        $roles=DB::table('roles')
        ->select('id','nombre','descripcion')
        ->where('condicion','=','1')->get();

        return view("seguridad.usuario.create",["roles"=>$roles]);
    }

    public function store(Request $request)
    {
        //

        $user= new User();
        $user->nombre = $request->nombre;
        $user->tipo_documento = $request->tipo_documento;
        $user->num_documento = $request->num_documento;
        $user->telefono = $request->telefono;
        $user->email = $request->email;
        $user->direccion = $request->direccion;
        $user->usuario = $request->usuario;
        $user->password = bcrypt( $request->password);
        $user->condicion = '1';
        $user->idrol = $request->id_rol;

            //inicio registrar imagen
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
                $path = $request->file('imagen')->storeAs('public/img/usuarios',$fileNameToStore);


            } else{

                $fileNameToStore="noimagen.jpg";
            }

           $user->imagen=$fileNameToStore;

            //fin registrar imagen
            $user->save();
            return Redirect::to("seguridad/usuario");
    }

    public function edit($id)
    {
        return view("seguridad.usuario.edit",["usuario"=>User::findOrFail($id)]);
    }

    public function update(Request $request)
    {
        //

        $user= User::findOrFail($request->id_usuario);
        $user->nombre = $request->nombre;
        $user->tipo_documento = $request->tipo_documento;
        $user->num_documento = $request->num_documento;
        $user->telefono = $request->telefono;
        $user->email = $request->email;
        $user->direccion = $request->direccion;
        $user->usuario = $request->usuario;
        $user->password = bcrypt($request->password);
        $user->condicion = '1';
        $user->idrol = $request->id_rol;

           //Editar imagen

           if($request->hasFile('imagen')){

                    /*si la imagen que subes es distinta a la que está por defecto
                    entonces eliminaría la imagen anterior, eso es para evitar
                    acumular imagenes en el servidor*/
                if($user->imagen != 'noimagen.jpg'){
                    Storage::delete('public/imagenes/usuarios/'.$user->imagen);
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
                $path = $request->file('imagen')->storeAs('public/img/usuarios',$fileNameToStore);



            } else {

                $fileNameToStore = $user->imagen;
            }

               $user->imagen=$fileNameToStore;


         //fin editar imagen

          $user->save();
          return Redirect::to("seguridad.usuario");
    }


    public function destroy(Request $request)
    {
        //
        $user= User::findOrFail($request->id_usuario);

         if($user->condicion=="1"){

                $user->condicion= '0';
                $user->save();
                return Redirect::to("seguridad/usuario");

           }else{

                $user->condicion= '1';
                $user->save();
                return Redirect::to("seguridad/usuario");

            }
    }

}
