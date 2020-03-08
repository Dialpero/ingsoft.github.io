@extends('layout')

@section('tittle') 
    Registro
@endsection

@section('content')

<div class="container">
    <div class="bg-white p-5 shadow rounded">
        <div class="d-flex justify-content-between align-items-center">
            <h1> {{ $facultades->nombre}} </h1>  
        </div>
        <p class="text-secondary"> 
            ID Decano: {{ $facultades->email }}<br>
            ID Facultad: {{ $facultades->id}}<br>
            Estado: {{ $facultades->estado }}<br>
        </p>
        <p class="text-black-50"> {{ $facultades->created_at->diffForHumans() }} </p>
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('facultades.show') }}">Regresar</a>
            @auth
            <div class="btn-group btn-group-sm">
                <a class="btn btn-primary" href="{{ route('facultades.edit', $facultades) }}">Editar</a>
                <form method="POST" action="{{ route('facultades.destroy', $facultades) }}">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger" >Eliminar</button>
                </form>
            </div>
            @endauth
        </div>
    </div>
    <hr>
</div>

@endsection