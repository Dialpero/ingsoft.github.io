@extends('layout')

@section('tittle')
    Editar académico
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-24 col-sm-20 col-lg-12 mx-auto">
            @include('partials.validation-errors')
            <form class="bg-white py-3 px-4 shadow rounded" 
            method="POST" action="{{ route('academics.update', $academic) }}">
                @method('PATCH')
                <h1 class="display-4">Editar académico</h1><hr>
                @include('academics._form', ['btnText' => 'Actualizar'])
            </form>
        </div>
    </div>
</div>
@endsection