@extends('layouts.app2')

@section('content')
<div class=" contenido" >

<table class="table contenido-tabla">
<h2>Lista de usuarios <a href="{{ route('usuarios.create')}}"><button type="button" class="btn btn-primary float-right" >Agregar nuevo usuario</button></a></h2>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOMBRES</th>
      <th scope="col">APELLIDOS</th>
      <th scope="col">EMAIL</th>
      <th scope="col">GENERO</th>
      <th scope="col">OCUPACION</th>
      
    </tr>
  </thead>
        <tbody>
        @foreach($usuarios as $usuario)
      
             <tr>
                 <th scope="row">{{$usuario->identificacion}}</th>
                 <td>{{$usuario->nombres}}</td>
                 <td>{{$usuario->apellidos}}</td>
                 <td>{{$usuario->email}}</td>
                 <td>{{$usuario->genero}}</td>
                 <td>{{$usuario->ocupacion}}</td>
                 <td>
                 
               
                 <form action="{{ route('usuarios.destroy', $usuario->identificacion)}}" method="POST">
                <a href="{{ route('usuarios.show', $usuario->id)}}"><button type="button" class="btn btn-secondary">Ver Informacion</button></a>
                 <a href="{{ route('usuarios.edit', $usuario->identificacion)}}"><button type="button" class="btn btn-warning">Editar</button></a>
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                 
                
               </td>
               </tr>
        @endforeach
  
       </tbody>
</table>
</div>
@endsection
