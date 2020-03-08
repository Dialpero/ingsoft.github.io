@extends('layout')

@section('tittle')
    Departamentos 
@endsection

@section('content')
<div class="container">
    <form method="POST" action="{{ route('departamento.store') }}" class="was-validated">
    @csrf
    <div class="d-flex justify-content-between align-items-center">
    <h1 class="display-4 mb-0">Departamentos</h1>
    @auth
        
    @endauth
    </div>
    <hr>
    <p class="lead text-secondary">Facultades Actuales</p>
    <ul class="list-group">
    <li class="list-group-item border-0 mb-3 shadow-sm">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Facultades</label>
        <select class="form-control" id="exampleFormControlSelect1" name="facultad" required>
        @forelse ($facultades as $facultadesItem)
                <option>{{ $facultadesItem->nombre }} </option>
                
        @empty
            <li class="list-group-item border-0 mb-3 shadow-sm">
                No hay facultades registradas
            </li>
        @endforelse
        </select>
    </div>        
    </ul>

    <ul class="list-group">
        <li class="list-group-item border-0 mb-3 shadow-sm">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Secretaria (ID)</label>
                <select class="form-control" id="exampleFormControlSelect1" name="id_Secretaria" required>
                @forelse ($usuarios as $usuariosItem)
                    @if($usuariosItem->typeuser == 'Secretaria' and $usuariosItem->estado == 'Inactivo')
                        <option>{{ $usuariosItem->id }} </option>
                    @endif
                        
                @empty
                    <li class="list-group-item border-0 mb-3 shadow-sm">
                        No hay secretarias disponibles
                    </li>
                @endforelse
                </select>
            </div>        
    </ul>

    <div class="container">
        
            <div class="form-group">
                <label for="pwd">ID Dept:</label>
                <input type="number" class="form-control" placeholder="Ingrese el ID del Departamento" name="id_Dept" required>
                <div class="valid-feedback">Valido.</div>
                <div class="invalid-feedback">Porfavor ingrese solo números.</div>
            </div>
            <div class="form-group">
                <label for="uname">Nombre:</label>
                <input type="text" class="form-control"  placeholder="Ingrese el nombre del departamento" name="nombre" required>
                <div class="valid-feedback">Valido.</div>
                <div class="invalid-feedback">Porfavor ingrese un nombre correcto.</div>
            </div>

            <div class="form-group">
                <label for="pwd">Estado:</label>
                <input type="text" class="form-control"  placeholder="Ingrese el Estado" name="estado" required>
                <div class="valid-feedback">Valido.</div>
                <div class="invalid-feedback">Porfavor un estado valido.</div>
            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
</div>
@endsection