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
                                <th>Acciones</th>
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
                                    <td><button 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modalEliminarVenta"        
                                        class="btn btn-danger m-1"
                                        style="font-size: 12px;"
                                        data-id="{{$venta->id}}"
                                        data-fecha="{{ date('d/m/Y', strtotime(($venta->created_at))) }}"
                                        data-total="{{$venta->total}}"
                                        data-comprador="{{$venta->comprador}}"
                                        data-numero_pedido="{{$venta->numero_pedido}}"
                                        data-direccion="{{$venta->direccion}}"
                                        onclick="mostrarModalEliminarVenta(this)">
                                            Eliminar
                                        </button></td>
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

@include('components.modalEliminarVenta')

<script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<script>
    function mostrarModalEliminarVenta(btn) {
    let actionCorrecto = window.location.protocol + "//" + window.location.host + "/eliminarVentas/" + btn.dataset.id;
    $('#formEliminarVenta').attr('action', actionCorrecto);

    $('#eliminarIDInput').val(btn.dataset.id);
    $('#eliminarFechaInput').val(btn.dataset.fecha);
    $('#eliminarTotalInput').val(btn.dataset.total);
    $('#eliminarCompradorInput').val(btn.dataset.comprador);
    $('#eliminarNumeroPedidoInput').val(btn.dataset.numero_pedido);
    $('#eliminarDireccionInput').val(btn.dataset.direccion);

    $('#modalEliminarVenta').show;
}

</script>
@else
    @include('components.usuarioNoAutorizado')
@endif

@endsection
