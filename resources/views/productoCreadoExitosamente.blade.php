@extends('layout.basicLayout')

@section('title', 'Producto Creado')
@section('navTitle', 'Producto Creado')

@section('body')
<div class="container mt-5">
    <div class="card shadow-sm text-center">
        <div class="card-body">
            <h3 class="h3 text-success">¡Producto creado con éxito!</h3>
            <p class="mt-3">¿Qué deseas hacer ahora?</p>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-4">
                <button onclick="window.location.href = '{{ url('/admin/formCrearProducto') }}'" class="btn btn-outline-primary btn-lg me-2">
                    Crear un nuevo producto
                </button>
                <button onclick="window.location.href = '{{ url('/admin/productosExistentes') }}'" class="btn btn-outline-secondary btn-lg">
                    Ver productos existentes
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
