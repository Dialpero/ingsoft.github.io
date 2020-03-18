@extends('layout2')

@section('content')
<h1 class="page-header">Listado de evaluaciones</h1>
    <table class="table table-hover table-striped">
    <thead>
            <tr>
                <th>ID</th>
                <th>Rut academico</th>
                <th>Evaluador 1</th>
                <th>Evaluador 2</th>
                <th>Calificación final</th>
            </tr>                            
        </thead>
        <tbody>
            @foreach($evaluaciones as $evaluacion)
            <tr>
                <td>{{ $evaluacion->id }}</td>
                <td>{{ $evaluacion->rut_academico }}</td>
                <td>{{ $evaluacion->rut_evaluador1 }}</td>
                <td>{{ $evaluacion->rut_evaluador2 }}</td>
                <td class="text-right">{{ $evaluacion->calificacion_final }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <p>
        <a href="{{ route('evaluaciones.pdf') }}" class="btn btn-sm btn-primary">
            Descargar Archivo PDF
        </a>
        <a href="javascript:window.history.back();" class="btn btn-sm btn-primary">
            Regresar
        </a>
    </p>
@endsection