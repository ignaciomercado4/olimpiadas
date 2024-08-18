
@extends('layout.basicLayout')

@section('title', 'Productos existentes')
@section('navTitle', 'Productos existentes')

@section('body')

    <div class="container d-flex justify-content-center mt-5">
        @include('components.tablaProductosExistentes')
    </div>

@endsection