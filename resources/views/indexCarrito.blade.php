@extends('layout.basicLayout')

@section('navTitle', 'Carrito de compras')

@section('body')
<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    @if($cartItems->count())
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Resumen del Carrito</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Producto</th>
                            <th>Código</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalFinalCarrito = 0;
                        @endphp

                        @foreach($cartItems as $item)
                            @php
                                $precioUnitario = floatval($item->product->precio_unitario);
                                $cantidad = intval($item->quantity);

                                if (is_numeric($precioUnitario) && is_numeric($cantidad)) {
                                    $totalFinalCarrito += $precioUnitario * $cantidad;
                                }
                            @endphp
                        
                            <tr>
                                <td>{{ $item->product->titulo }}</td>
                                <td>{{ $item->product->codigo_producto }}</td>
                                <td>{{ $cantidad }}</td>
                                <td>{{ $precioUnitario }} $</td>
                                <td>{{ $precioUnitario * $cantidad }} $</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-4">
                    <h4>Total final: <strong>{{ $totalFinalCarrito }} $</strong></h4>
                    <form action="{{ route('cart-save-pedido') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-lg">Guardar Pedido</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info mt-4" role="alert">
            <p class="mb-0">No tienes productos en tu carrito. <a href="{{ route('productosExistentes') }}" class="alert-link">Explorar productos</a></p>
        </div>
    @endif
</div>
@endsection
