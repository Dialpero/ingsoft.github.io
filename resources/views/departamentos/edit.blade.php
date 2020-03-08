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

            <div class="form-group">
                <label for="name">ID Secretaria:</label>
                <input type="number" class="form-control"  value="{{ $departamento->id_Secretaria }}" name="id_Secretaria" required>
                <div class="valid-feedback">Valido.</div>
                <div class="invalid-feedback">Porfavor ingrese un id correcto.</div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection