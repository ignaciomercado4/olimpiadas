@extends('layout.basicLayout')

@section('title', 'Productos existentes')
@section('navTitle', 'Productos existentes')

@section('body')
    <div class="container mt-5">

        <!-- mensajes de éxito y error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="d-flex justify-content-center mt-5">
            @if($productosExistentes->isEmpty())
                <div class="alert alert-info">
                    No hay productos creados. 
                    
                    <a href="{{ route('viewFormCrearProducto') }}">
                        Crear productos.
                    </a>
                </div>
            @else
                @include('components.tablaProductosExistentes')
            @endif
        </div>
    </div>
@endsection
