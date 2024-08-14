
@extends('layout.basicLayout')

@section('title', 'Producto creado')

@section('body')
    <div class="container-fluid bg-primary text-dark">
        <h1 class="pb-1">
            Producto Creado
        </h1>
        <a href="{{ route('logout') }}" class="text-black">
            Cerrar sesión
        </a>
    </div>

    <h3>
        Producto creado con éxito, ¿qué deseas hacer ahora?
    </h3>
    <button onclick="window.location.href = '{{ url("/admin/formCrearProducto") }}'" class="btn btn-primary">
        Crear un nuevo producto
    </button>
    <button onclick="window.location.href = '{{ url("/admin/productosExistentes") }}'" class="btn btn-primary">
        Ver productos existentes
    </button>

@endsection