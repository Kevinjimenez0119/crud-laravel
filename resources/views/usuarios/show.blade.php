@extends('layouts.app2')

@section('content')

<div class="contenido">
  <div class="container contenedor-verHc">
  <div class="header-verHc">
    <h2>Informacion</h2>
  </div>
    
    @foreach($usuarios as $usuario)
    <h3 style="color: blue;">Id:</h3>
    <p class="lead"> {{$usuario->identificacion}}</p>
    <h3 style="color: blue;">Nombres:</h3>
    <p class="lead"> {{$usuario->nombres}}</p>
    <h3 style="color: blue;">Apellidos:</h3>
    <p class="lead"> {{$usuario->apellidos}}</p>
    <h3 style="color: blue;">Email:</h3>
    <p class="lead"> {{$usuario->email}}</p>
    <h3 style="color: blue;">Genero:</h3>
    <p class="lead"> {{$usuario->genero}}</p>
    <h3 style="color: blue;">Ocupacion:</h3>
    <p class="lead"> {{$usuario->ocupacion}}</p>
    @endforeach
    <h2>Informacion de contanto</h2>
    @foreach($contactos as $contacto)
    <h3 style="color: blue;">Telefono:</h3>
    <p class="lead"> {{$contacto->telefono}}</p>
    <h3 style="color: blue;">Direccion:</h3>
    <p class="lead"> {{$contacto->direccion}}</p>
    <h3 style="color: blue;">Ciudad:</h3>
    <p class="lead"> {{$contacto->ciudad}}</p>
    <h3 style="color: blue;">Recidencia:</h3>
    <p class="lead"> {{$contacto->recidencia}}</p>

    @endforeach
    <a href="{{ route('usuarios.index')}}"><button type="button" class="btn btn-danger">Atras</button></a>
  </div>
</div>

@endsection
