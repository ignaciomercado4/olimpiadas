@extends('layout.basicLayout')

@section('navTitle', 'Carrito de compras')

@section('body')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
    @if($cartItems->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->titulo }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->product->precio_unitario }}</td>
                        <td>{{ $item->product->precio_unitario * $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('cart-save-pedido') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Guardar Pedido</button>
        </form>
    @else
        <p>No tienes productos en tu carrito.</p>
    @endif
</div>
@endsection
