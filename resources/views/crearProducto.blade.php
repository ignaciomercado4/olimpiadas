@extends('layout.basicLayout')

@section('title', 'Crear Producto')
@section('navTitle', 'Crear Producto')

@section('body')
@if (Auth::user()->isAdmin == 1)
    
<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('crearProducto') }}" method="POST" id="crearProductoForm">
                @csrf

                <div class="mb-3">
                    <label for="codigo_producto" class="form-label">Código de Producto</label>
                    <input type="text" name="codigo_producto" id="codigoProductoInput" placeholder="Ingrese su cód. de producto" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" name="titulo" id="tituloInput" placeholder="Ingrese el título" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" id="descripcionInput" placeholder="Ingrese la descripción" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="precio_unitario" class="form-label">Precio Unitario</label>
                    <input type="number" step="0.01" name="precio_unitario" id="precioUnitarioInput" placeholder="Ingrese el precio unitario" class="form-control">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">
                        Crear Producto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function submitCrearProductoForm() {
        const crearProductoForm = document.querySelector('#crearProductoForm');
        crearProductoForm.submit();
    }
</script>
@else
    @include('components.usuarioNoAutorizado')
@endif
@endsection
