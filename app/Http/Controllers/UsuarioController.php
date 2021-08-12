<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Modelos
use App\Models\Usuarios;
use App\Models\Contactos;
//Consultas a la base de datos
use DB;
//Encriptar contraseña
use Illuminate\Support\Facades\Hash;
//Validaciones para los request
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\EditUsuarioRequest;

//Controlador de usuarios 
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Metodo index, retorna la vista de todos los usuarios
    public function index()
    {
        //consulta los ultimos 10 usuarios registrados en la base de datos (orderBy('created_at', 'desc'))
        $usuarios = Usuarios::orderBy('created_at', 'desc')->paginate(10);
        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Motodo create, retorna la vista con el formulario para la creación de un nuevo usuario
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Metodo store, se recoge la información de la vista y se guarda en la base de datos
    public function store(UsuarioRequest $request)
    {
        try{
            //validar si el usuario que se va a crear ya existe en la base de datos. Se valida la IDENTIFICACION
            $ver = DB::table('usuarios')->where('identificacion', request('id'))->value('identificacion');
            //Sí el usuario existe se manda una alerta y vuelve a la lista de todos los usuarios
            if($ver == request('id'))
            {

               echo '<script language="javascript">alert("El usuario ya esta registrado");</script>';
            
               $usuarios = Usuarios::paginate(10);
               return view('usuarios.index', ['usuarios' => $usuarios]);

            }else{

               //Se recoge los datos del usuario 
               $usuario =new Usuarios();

               $usuario->nombres = request('nombres');
               $usuario->identificacion = request('id');
               $usuario->email = request('email');
               $usuario->identificacion = request('id');
               $usuario->password = Hash::make(request('password'));
               $usuario->apellidos = request('apellido');
               $usuario->genero = request('genero');
               $usuario->ocupacion = request('ocupacion');

               //Se guarda el usuario
               $usuario->save();
               $usuariob = DB::table('usuarios')->where('identificacion', request('id'))->get('id');

               //Se recoge los datos del contacto del usuario 
               $contacto =new Contactos();
               $contacto->telefono = request('telefono');
               $contacto->direccion = request('dir');
               $contacto->ciudad = request('ciudad');
               $contacto->recidencia = request('recid');
               foreach($usuariob as $user)
                {
                  $contacto->id_usuario = $user->id;
                }
        
                //Se guarda el usuario
                $contacto->save();

                echo '<script language="javascript">alert("El paciente ha sido registrado exitosamente");</script>';      
        
                $usuarios = Usuarios::paginate(10);
                 return view('usuarios.index', ['usuarios' => $usuarios]);
                }
        }catch (Exception $e) {
                echo '<script language="javascript">alert("Error al crear al usuario");</script>';
                $usuarios = Usuarios::paginate(10);
                return view('usuarios.index', ['usuarios' => $usuarios]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Metodo show, se muestra la información del usuario elegido
    public function show($id)
    {
        //se consulta en la base de datos el id del usuario 
        $usuarios = DB::table('usuarios')->where('id', $id)->get();
        //se consulta en la base de datos el id del usuario 
        $contactos = DB::table('contactos')->where('id_usuario', $id)->get();
        return view('usuarios.show', ['usuarios' => $usuarios], ['contactos' => $contactos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Motodo create, retorna la vista con el formulario para la edición del usuario
    public function edit($id)
    {
        try{
        return view('usuarios.edit', ['usuario' => Usuarios::findOrFail($id)]);
        }catch (Exception $e) {
            echo '<script language="javascript">alert("Error al cargar el usuario");</script>';
            $usuarios = Usuarios::paginate(10);
            return view('usuarios.index', ['usuarios' => $usuarios]);
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Metodo update, se recoge la información de la vista y se actualiza en la base de datos
    public function update(EditUsuarioRequest $request, $id)
    {
        try{
            //Se busca si el usuario existe, si no existe lanza un error

            $usuario= Usuarios::findOrFail($id);
            //Se recoge los datos del usuario a editar
            $usuario->identificacion = request('id');
            $usuario->nombres = $request->get('nombres');
            $usuario->email = $request->get('email');
            $usuario->apellidos = request('apellido');
            $usuario->genero = request('genero');
            $usuario->ocupacion = request('ocupacion');
 
            //Se actualiza al usuario
            $usuario->update();
        
        
            echo '<script language="javascript">alert("El usuario ha sido actualizado exitosamente");</script>';
        
            $usuarios = Usuarios::paginate(10);
            return view('usuarios.index', ['usuarios' => $usuarios]);

        }catch (Exception $e) {
            echo '<script language="javascript">alert("Error al actualizar al usuario");</script>';
            $usuarios = Usuarios::paginate(10);
            return view('usuarios.index', ['usuarios' => $usuarios]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Metodo destroy, se elimina al usuario por su id
    public function destroy($id)
    {
        try{
            $usuario = Usuarios::findOrFail($id);
            $usuario->delete();
            $usuarios = Usuarios::paginate(10);
            return view('usuarios.index', ['usuarios' => $usuarios]);
        }catch (Exception $e) {
            echo '<script language="javascript">alert("Error al eliminar al usuario");</script>';
            $usuarios = Usuarios::paginate(10);
            return view('usuarios.index', ['usuarios' => $usuarios]);
        }
        
    
}
}
