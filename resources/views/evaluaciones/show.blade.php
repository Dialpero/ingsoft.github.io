@extends('layout')

@section('tittle', 'Evaluación | ' .$evaluacion->rut_academico) <!-- $academic = elemento de tabla BD academics -->
    
@section('content')
<div class="container">
    <div class="bg-white p-5 shadow rounded">
        <div class="d-flex justify-content-between align-items-center">
            <h1> {{ $evaluacion-> rut_academico}} </h1>         
        </div>
        <p class="text-secondary"> 
                ID: {{ $evaluacion->id }} <br> 
                Calificacion anterior: {{ $evaluacion->calificacion_anterior }}<br>
                Calificacion: {{ $evaluacion->calificacion_final }}<br>
                Observación: {{ $evaluacion->observacion_final }} <br>
                Fecha de evaluación: {{ $evaluacion->created_at->format('d/m/Y')}} 
        </p>
        <p class="text-black-50"> {{ $evaluacion->created_at->diffForHumans() }} </p>
        <div class="d-flex justify-content-between align-items-center">
            <a href="javascript:window.history.back();">Regresar</a>
            <div class="btn-group btn-group-sm">
            <a class="btn btn-primary" href="{{ route('evaluaciones.edit', $evaluacion) }}">Editar</a>
            <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-evaluacion').
                    submit()">Eliminar</a>
            </div>
                <form id="delete-evaluacion" 
                class="d-none"
                method="POST" action="{{ route('evaluaciones.destroy', $evaluacion) }}">
                    @csrf @method('DELETE')
                </form>
 
        </div>
    </div>
</div>
@endsection