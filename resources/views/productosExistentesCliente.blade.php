@extends('layout.basicLayout')

@section('title', 'Productos Existentes')
@section('navTitle', 'Productos Existentes')

@section('body')
<div class="container mt-5">
    <div class="row">
        @foreach ($productosExistentes as $producto)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <!-- Mostrar la imagen del producto -->
                    @if($producto->imagen)
                    <img src="{{ asset('/' . $producto->imagen) }}" class="card-img-top product-image" alt="{{ $producto->titulo }}">
                    @else
                    <img src="https://via.placeholder.com/150" class="card-img-top product-image" alt="Imagen no disponible">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->titulo }}</h5>
                        <p class="card-text">{{ Str::limit($producto->descripcion, 100) }}</p>
                        <p class="card-text"><strong>Precio:</strong> ${{ $producto->precio_unitario }}</p>
                        <p class="card-text"><strong>Stock:</strong> {{ $producto->stock }}</p>
                        <!-- Botón para abrir el modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal{{ $producto->id }}">
                            Ver detalles
                        </button>
                    </div>
                </div>
            </div>

            @include('components.modalVerDetallesProducto')
        @endforeach
    </div>
</div>

<style>
    .product-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
</style>
@endsection
