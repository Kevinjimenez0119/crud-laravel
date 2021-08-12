@extends('layouts.app2')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<style>
  
</style>
<div  class="card contenedor_formulario">
<h2 style="text-align: center;">Editar Usuario</h2>
<form action="{{ route('usuarios.update', $usuario->identificacion)}}" method="POST">
@method('PATCH')
@csrf
<div style="margin:20px;">
<div class="form-group">
    <label for="nombre">Identificacion</label>
    <input type="text" class="form-control" name="id" value="{{$usuario->identificacion}}" >
    
  </div>

  <div class="form-group">
    <label for="nombre">Nombres</label>
    <input type="text" class="form-control" name="nombres" value="{{$usuario->nombres}}" placeholder="Nombres">
    
  </div>
  <div class="form-group">
    <label for="nombre">Apellidos</label>
    <input type="text" class="form-control" name="apellido" placeholder="Apellidos" value="{{$usuario->apellidos}}">
    
  </div>
  <div class="form-group">
    <label for="email">Email </label>
    <input type="email" class="form-control" name="email" value="{{$usuario->email}}" placeholder="Email">
    
  </div>
  <div class="form-group">
    <label for="nombre">Ocupacion</label>
    <input type="text" class="form-control" name="ocupacion" placeholder="Ocupacion" value="{{$usuario->ocupacion}}">
    
  </div>
  <div class="form-group">
    <label for="genero">Genero </label>
    <select name="genero" class="form-control" id="genero">
  
    <option value="Masculino">Masculino</option>
    <option value="Femenino">Femenino</option>
    <option value="Otro">Otro</option>
    
    </select>
    
  </div>
  
  
  
  
  <button type="submit" class="btn btn-primary">Actualizar</button>
  <a href="{{ route('usuarios.index')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
  </div>
</form>
</div>
@endsection