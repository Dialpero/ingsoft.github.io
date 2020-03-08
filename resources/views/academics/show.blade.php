@extends('layout')

@section('tittle', 'Académicos | ' .$academic->rut) <!-- $academic = elemento de tabla BD academics -->
    
@section('content')

<div class="container">
    <div class="bg-white p-5 shadow rounded">
        <div class="d-flex justify-content-between align-items-center">
            <h1> {{ $academic-> rut}} </h1>  
        </div>
        <p class="text-secondary"> 
            Nombre: {{ $academic->nombre_1 }}
            {{ $academic->apellido_1 }}<br>
            Título: {{ $academic->titulo }}<br>
            Departemento: {{ $academic->depto }}<br>
            Horas de contrato: {{ $academic->hrs_contrato }}<br>
            Tipo de planta: {{ $academic->planta }}<br>
            Estado: {{ $academic->estado }}<br>
            Categoría: {{ $academic->categoria }}<br>
  
        </p>
        <p class="text-black-50"> {{ $academic->created_at->diffForHumans() }} </p>
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('academics.index') }}">Regresar</a>
            @auth
            <div class="btn-group btn-group-sm">
                <a class="btn btn-primary" href="{{ route('academics.edit', $academic) }}">Editar</a>
                <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-academic').
                submit()">Eliminar</a>
            </div>
                <form id="delete-academic" 
                class="d-none"
                method="POST" action="{{ route('academics.destroy', $academic) }}">
                    @csrf @method('DELETE')
                </form>

            @endauth
        </div>
    </div>
    <hr>
</div>


<div class="container">
    <div class="bg-white p-5 shadow rounded">
        <div class="btn-group btn-group-sm">
            <a class="btn btn-warning" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Evaluaciones anteriores</a> 
            <a class="btn btn-warning" href="{{ route('evaluaciones.createEvaluation', $academic) }}">Evaluar académico</a>
            <form method="POST" action="{{ route('evaluaciones.promedio') }}" class="was-validated">
                @csrf @method('PATCH')
                <button type="submit" class="btn btn-warning">Ver ranking</button>
            </form>
        </div>
        
        <div class="d-flex justify-content-between align-items-center">
            <div class="collapse" id="collapseExample">
            <br>
            @forelse($concatenated as $dato)
                @if($concatenated->count())
                    <a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('evaluaciones.show', $dato)}}">
                    <span class="text-black-50">     
                        ID: {{ $dato->id }} <br> Calificacion: {{ $dato->calificacion_final}} <br>
                        Fecha de evaluación: {{ $dato->created_at->format('d/m/Y')}} 
                    </span>  
                    </a>
                @else
                    No tiene evaluaciones anteriores
                @endif
            @endforeach
            </div>

    </div>
</div>
@endsection