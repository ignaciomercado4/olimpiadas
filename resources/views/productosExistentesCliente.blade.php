
@extends('layout.basicLayout')

@section('title', 'Productos existentes')

@section('body')
<div class="container-fluid bg-primary text-dark">
    <h1 class="pb-1">
        Productos existentes
    </h1>
</div>

<div class="container mt-4">
    <div class="row">
        @foreach ($productosExistentes as $producto)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->titulo }}</h5>
                        <p class="card-text">
                            {{ $producto->descripcion }}
                        </p>
                        <p class="card-text">
                            <strong>Precio:</strong> ${{ $producto->precio_unitario }}
                        </p>
                        <p class="card-text">
                            <strong>Stock:</strong> {{ $producto->stock }}
                        </p>
                        <form action="{{ route('cart-add', $producto->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection