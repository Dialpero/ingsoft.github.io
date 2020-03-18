@extends('layout')

@section('tittle')
    departamentos  
@endsection

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center">
    <h1 class="display-4 mb-0">Departamentos</h1>
    @auth
        <a class="btn btn-primary" href="{{ route('departamentos.add_departamentos') }}">Ingresar departamento</a> 
    @endauth
    </div>
    <hr>
    <p class="lead text-secondary">Departamentos Actuales</p>
    <ul class="list-group">
        @forelse ($departamentos as $departamentosItem)
            <li class="list-group-item border-0 mb-3 shadow-sm">
            <a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('departamentos.indiv', $departamentosItem)}}"> 
                <span class="font-weight-bold">     
                Nombre: {{ $departamentosItem->nombre }}
                </span>
                <span class="text-black-50"> 
                {{ $departamentosItem->created_at->format('d/m/Y')}} 
                </span> 
            </a> 
            </li>
        @empty
            <li class="list-group-item border-0 mb-3 shadow-sm">
                No hay departamentos registrados
            </li>
        @endforelse
            
    </ul>
</div>
@endsection