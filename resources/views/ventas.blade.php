@extends('layout.basicLayout')

@section('title', 'Ventas')
@section('navTitle', 'Ventas históricas')

@section('body')

@if (Auth::user()->isAdmin == 1)
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Ventas Históricas</h2>

            @if(isset($ventas) && $ventas->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID Venta</th>
                                <th>Fecha de Creación</th>
                                <th>Total ($)</th>
                                <th>Comprador</th>
                                <th>Número de Pedido</th>
                                <th>Dirección</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ventas as $venta)
                                <tr>
                                    <td>{{ $venta->id }}</td>
                                    <td>{{ date('d/m/Y H:i:s', strtotime($venta->created_at)) }}</td>
                                    <td>{{ number_format($venta->total, 2) }} $</td>
                                    <td>{{ $venta->comprador }}</td>
                                    <td>{{ $venta->numero_pedido }}</td>
                                    <td>{{ $venta->direccion }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info text-center">
                    No hay ventas registradas.
                </div>
            @endif
        </div>
    </div>
</div>
@else
    @include('components.usuarioNoAutorizado')
@endif

@endsection
