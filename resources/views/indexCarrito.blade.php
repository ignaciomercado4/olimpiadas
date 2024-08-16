@extends('layout.basicLayout')

@section('body')
<div class="container">
    <h1>Carrito de Compras</h1>
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
    @else
        <p>No tienes productos en tu carrito.</p>
    @endif
</div>
@endsection
