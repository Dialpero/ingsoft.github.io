@extends('layout')

@section('tittle') 
    Registro
@endsection

@section('content')

<div class="container">
    <div class="bg-white p-5 shadow rounded">
        <div class="d-flex justify-content-between align-items-center">
            <h1> {{ $departamento->nombre}} </h1>  
        </div>
        <p class="text-secondary"> 
            Facultad: {{ $departamento->facultad }}<br>
            ID Departamento: {{ $departamento->id_Dept}}<br>
            Estado: {{ $departamento->estado }}<br>
            ID Secretaria: {{ $departamento->id_Secretaria }}<br>
        </p>
        <p class="text-black-50"> {{ $departamento->created_at->diffForHumans() }} </p>
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('departamentos.show') }}">Regresar</a>
            @auth
            <div class="btn-group btn-group-sm">
                <a class="btn btn-primary" href="{{ route('departamentos.edit', $departamento) }}">Editar</a>
                <form method="POST" action="{{ route('departamentos.destroy', $departamento) }}">
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