@extends('layout')

@section('tittle')
    usuarios
@endsection


@section('content')
<div class="container">
    <div class="bg-white p-5 shadow rounded">
    @foreach($usuarios as $usuario)
        <div class="d-flex justify-content-between align-items-center">
            <h3> {{ $usuario->name }} </h3>         
        </div>
        <p class="text-secondary"> 
            Nombre: {{ $usuario->name }}      email: {{ $usuario->email }}      Tipo de usuario: {{ $usuario->typeuser }}
        </p>
        <p class="text-black-50"> {{ $usuario->created_at->diffForHumans() }} </p>
        <div class="btn-group btn-group-sm">
                <a class="btn btn-primary" href="{{ route('edit', $usuario->id )}}">Editar  </a>
        </div>
    

    @endforeach()
</div>
 

@endsection

