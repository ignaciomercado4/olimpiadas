@extends('layout.basicLayout')

@section('title', 'Productos Existentes')
@section('navTitle', 'Productos Existentes')

@section('body')
<div class="container mt-5">
    <!-- Barra de búsqueda -->
    @include('components.barraDeBusqueda')
    
    <!-- Sidebar -->
    @include('components.sidebarFiltros')

        <!-- Productos -->
    <div class="row" id="product-container">
        @foreach ($productosExistentes as $producto)
            <div class="col-md-4 product-col">
                <div class="card mb-4 shadow-sm product-card">
                    @if($producto->imagen)
                        <img src="{{ asset('/' . $producto->imagen) }}" class="card-img-top product-image" alt="{{ $producto->titulo }}">
                    @else
                        <img src="https://via.placeholder.com/150" class="card-img-top product-image" alt="Imagen no disponible">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">
                            {{ Str::limit($producto->titulo, 30) }} - <span style="font-size: 16px;" class="opacity-50">{{ $producto->categoria }}</span>
                            

                        </h5>
                        <p class="card-text">
                            {{ Str::limit($producto->descripcion, 110) }}

                        </p>
                        <p class="card-text mt-auto"><strong>Precio:</strong>
                            ${{ $producto->precio_unitario }}
                        </p>
                        <p class="card-text"><strong>Stock:</strong>
                            @if ($producto->stock > 0)
                                {{ $producto->stock }}
                            @else
                                Sin stock
                            @endif
                        </p>

                        <div class="d-flex mt-3">
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

<script type="text/javascript">
    document.getElementById('openSidebar').addEventListener('click', function() {
        document.getElementById('filterSidebar').style.left = '0';
    });

    document.getElementById('closeSidebar').addEventListener('click', function() {
        document.getElementById('filterSidebar').style.left = '-300px'; 
    });

</script>

<style>
    .sidebar {
        width: 300px;
        position: fixed;
        top: 0;
        left: -300px; 
        height: 100%;
        z-index: 1050;
        background-color: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(10px);
        overflow-y: auto;
        transition: left 0.3s ease;
        padding-top: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

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
