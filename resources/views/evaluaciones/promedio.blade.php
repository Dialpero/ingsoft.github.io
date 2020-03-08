@extends('layout')

@section('tittle')
    Ranking
@endsection

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center">
    <h1 class="display-4 mb-0">RANKING</h1>
    </div>
    <hr>
    <?php
        $iter = 0; 
    ?>
        
    <p class="lead text-secondary text-black-50">Ranking Académicos</p>
    <ul class="list-group">
        @foreach ($academics as $academic)
        <?php
            $iter = 1 + $iter;
        ?>
        
          <!-- == string === int -->
        <li class="list-group-item border-0 mb-9 shadow-sm">
        <a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('academics.show', $academic)}}"> 
            <span class="font-weight-bold">
                @if($iter === 1)
                       Rut: {{ $academic->rut }}                  Nombre: {{$academic->nombre_1}} {{$academic->apellido_1}}                Departamento: {{$academic->depto}}                              Nota: {{ $academic->promedio }} 
                       <img src="{{asset('primero.png')}}" style="float:left; margin:10px;" alt="Responsive image"><br>      
                @elseif($iter === 2)
                       Rut: {{ $academic->rut }}                  Nombre: {{$academic->nombre_1}} {{$academic->apellido_1}}                Departamento: {{$academic->depto}}                              Nota: {{ $academic->promedio }} 
                       <img src="{{asset('segun2.png')}}" style="float:left; margin:20px;" alt="Responsive image"><br>
                @elseif($iter === 3)
                       Rut: {{ $academic->rut }}                  Nombre: {{$academic->nombre_1}} {{$academic->apellido_1}}                Departamento: {{$academic->depto}}                              Nota: {{ $academic->promedio }} 
                       <img src="{{asset('tercero.png')}}" style="float:left; margin:30px;" alt="Responsive image"><br>
                @else
                                  {{$iter}}                                 Rut: {{ $academic->rut }}                  Nombre: {{$academic->nombre_1}} {{$academic->apellido_1}}                Departamento: {{$academic->depto}}                              Nota: {{ $academic->promedio }} 
                @endif 
            </span> 
        </a>
        </li>
        @endforeach
            
    </ul>
    
</div>
    

@endsection