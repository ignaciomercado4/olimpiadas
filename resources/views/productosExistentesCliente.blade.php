@extends('layout.basicLayout')

@section('title', 'Productos Existentes')
@section('navTitle', 'Productos Existentes')

@section('body')
<div class="container mt-5">
    <div class="row">
        @foreach ($productosExistentes as $producto)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm product-card">
                    <!-- Mostrar la imagen del producto -->
                    @if($producto->imagen)
                    <img src="{{ asset('/' . $producto->imagen) }}" class="card-img-top product-image" alt="{{ $producto->titulo }}">
                    @else
                    <img src="https://via.placeholder.com/150" class="card-img-top product-image" alt="Imagen no disponible">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ Str::limit($producto->titulo, 30) }}</h5>
                        <p class="card-text">{{ Str::limit($producto->descripcion, 110) }}</p>
                        <p class="card-text mt-auto"><strong>Precio:</strong> ${{ $producto->precio_unitario }}</p>
                        <p class="card-text"><strong>Stock:</strong>
                            @if ($producto->stock > 0)
                                {{ $producto->stock }}
                            @else
                                Sin stock
                            @endif
                        </p>
                        <!-- Contenedor para los botones -->
                        <div class="d-flex mt-3">
                            <!-- Botón para abrir el modal -->
                            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#productModal{{ $producto->id }}">
                                Ver detalles
                            </button>
                            <form action="{{ route('cart-add', $producto->id) }}" method="POST">
                                @csrf
                                @if ($producto->stock <= 0)
                                    <button type="submit" class="btn btn-success" disabled>Agregar al carrito</button>
                                @else
                                    <button type="submit" class="btn btn-success">Agregar al carrito</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @include('components.modalVerDetallesProducto')
        @endforeach
    </div>
</div>

<style>
    .product-card {
        height: 500px;
        display: flex;
        flex-direction: column;
    }

    .product-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        display: flex;
        flex-direction: column;
    }

    .card-text.mt-auto {
        margin-top: auto;
    }
</style>
@endsection
