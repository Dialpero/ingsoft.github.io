@extends('layout')

@section('tittle')
    Ingresar académicos  
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-24 col-sm-20 col-lg-12 mx-auto">
            @include('partials.validation-errors')
            <form class="bg-white py-3 px-4 shadow rounded" 
                method="POST" 
                action="{{ route('academics.store') }}">
                <h1 class="display-4">Nuevo académico</h1>
                <hr>
                @include('academics._form', ['btnText' => 'Guardar'])
            </form>
        </div>
    </div>
</div>
@endsection