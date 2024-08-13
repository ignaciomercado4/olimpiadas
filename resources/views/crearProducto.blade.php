@extends('layout.basicLayout')

@section('title', 'Crear Producto')

@section('body')
    <div class="container-fluid bg-primary text-dark">
        <h1 class="pb-1">
            Crear Producto
        </h1>
        <a href="{{ route('logout') }}" class="text-black">
            Cerrar sesión
        </a>
    </div>

    <form action="{{ route('crearProducto') }}" method="POST" id="crearProductoForm">
        @method('POST')
        @csrf

        <label for="codigo_producto" class="label">
            Ingrese el cód. de producto:
        </label>
        <input type="text" name="codigo_producto" id="codigoProductoInput" placeholder="Ingrese su cód. de producto" class="form-control m-1">

        
        <label for="titulo" class="label">
            Ingrese el titulo:
        </label>
        <input type="text" name="titulo" id="tituloInput" placeholder="Ingrese el titulo" class="form-control m-1">

        
        <label for="descripcion" class="label">
            Ingrese el descripcion:
        </label>
        <input type="text" name="descripcion" id="descripcionInput" placeholder="Ingrese la descripcion" class="form-control m-1">

        <label for="precio_unitario" class="label">
            Ingrese el precio unitario:
        </label>
        <input type="number" step="0.01" name="precio_unitario" id="precioUnitarioInput" placeholder="Ingrese el precio unitario" class="form-control m-1">
    
        <button onclick="submitCrearProductoForm()" class="btn btn-primary m-2">
            Crear
        </button>
    </form>

    <script>
        function submitCrearProductoForm() {
            const crearProductoForm = document.querySelector('#crearProductoForm');
            crearProductoForm.submit();
        }
    </script>
@endsection