@extends('layout.basicLayout')

@section('title', 'Productos existentes')
@section('navTitle', 'Productos Existentes')

@section('body')

<div class="container mt-4">
    <div class="row">
        @foreach ($productosExistentes as $producto)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->titulo }}</h5>
                        <p class="card-text" style="font-size: 12px; opacity: 0.8;">
                            {{ \Illuminate\Support\Str::limit($producto->descripcion, 100, '...') }}
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
