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
                Rut evaluador 1: {{ $evaluacion->rut_evaluador1 }} <br>
                Rut evaluador 2: {{ $evaluacion->rut_evaluador2 }} <br>
                Calificacion anterior: {{ $evaluacion->calificacion_anterior }}<br>
                Observación anterior: {{ $evaluacion->observacion_anterior }} <br>
        </p>
        <div class="d-flex justify-content-between align-items-left">
        <table class="table table-striped">
        <thead>
                <tr>
                        <th>Actividades</th>
                        <th>% de Tiempo</th>
                        <th>Notas</th>
                </tr>
        </thead>
        <tbody>
                <tr>
                        <th>De docencia</th>
                        <td>{{ $evaluacion->docencia_tiempo }}</td>
                        <td>{{ $evaluacion->docencia_nota }}</td>
                </tr>
                <tr>
                        <th>De Investigación</th>
                        <td>{{ $evaluacion->investigacion_tiempo }}</td>
                        <td> {{ $evaluacion->investigacion_nota }}</td>
                </tr>
                <tr>
                        <th>De Extensión y vinculación</th>
                        <td>{{ $evaluacion->extension_tiempo }}</td>
                        <td>{{ $evaluacion->extension_nota }}</td>
                </tr>
                <tr>
                        <th>De Administración</th>
                        <td>{{ $evaluacion->administracion_tiempo }}</td>
                        <td>{{ $evaluacion->administracion_nota }}</td>
                </tr>
                <tr>
                        <th>Otras</th>
                        <td>{{ $evaluacion->otras_tiempo }}</td>
                        <td>{{ $evaluacion->otras_nota }}</td>
                </tr>
                <tr>
                        <th>#</th>
                        <th>Calificación</th>
                        <td>{{ $evaluacion->calificacion_final }}</td>
                </tr>
                <tr class="info">
                        
                        <th>Observación</th>
                        <td>{{ $evaluacion->observacion_final }}</td>
                </tr>
        </tbody>
        </table>

        </div>
        <p class="text-secondary">
                Fecha de evaluación: {{ $evaluacion->created_at->format('d/m/Y')}} 
        </p>
        <p class="text-black-50"> {{ $evaluacion->created_at->diffForHumans() }} </p>
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('academics.index') }}">Regresar</a>
        @if(Auth::user()->typeuser=='Administrador' or Auth::user()->typeuser=='Secretaria')
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

        @endif
        </div>
         

    </div>
</div>

@endsection
 