@extends('layout')

@section('tittle')
    Departamentos
@endsection

@section('content')
    <div class="container">
    <br>
    <h1> Actualizar datos de {{$departamento->nombre}}</h1>
        <form method="POST" action="{{ route('departamentos.update', $departamento) }}" class="was-validated">
        @csrf @method('PATCH')

        <?php
            $aux = 'no';
        ?>
        @foreach($usuarios as $usuariosItem)
            @if($departamento->id_Secretaria == $usuariosItem->id)
            <?php
                $aux = 'si';
            ?>
            @endif
        @endforeach
        @if($aux === 'no')
            <ul class="list-group">
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Decanos (ID)</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="id_Secretaria" required>
                            @forelse ($usuarios as $usuariosItem)
                                @if($usuariosItem->typeuser == 'Secretaria' and $usuariosItem->estado == 'Inactivo')
                                    <option>{{ $usuariosItem->id}}</option>
                                @endif
                            @empty
                                <li class="list-group-item border-0 mb-3 shadow-sm">
                                    No hay usuario disponibles
                                </li>
                            @endforelse
                        </select>
                    </div>
            </ul>
        @else
                <div class="form-group">
                    <input type="hidden" id="id_Secretaria" name="id_Secretaria" value="{{ $departamento->id_Secretaria }}">
                </div>

                

        @endif
            <div class="form-group" >
                <label for="name">Nombre:</label>
                <input type="text" class="form-control"  value="{{ $departamento->nombre }}" name="nombre" required>
                <div class="valid-feedback">Valido.</div>
                <div class="invalid-feedback">Porfavor ingrese un nombre correcto.</div>
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control"  value="{{ $departamento->estado }}" name="estado" required>
                <div class="valid-feedback">Valido.</div>
                <div class="invalid-feedback">Porfavor un estado valido.</div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection