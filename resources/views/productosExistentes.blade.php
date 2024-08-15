
@extends('layout.basicLayout')

@section('title', 'Productos existentes')

@section('body')
    <div class="container-fluid bg-primary text-dark">
        <h1 class="pb-1">
            Productos existentes
        </h1>
    </div>

    <div class="container d-flex justify-content-center mt-5">
        @include('components.tablaProductosExistentes')
    </div>

@endsection