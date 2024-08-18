@extends('layout.basicLayout')

@section('title', 'Pedidos Existentes')
@section('navTitle', 'Pedidos Existentes')

@section('body')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Pedidos Existentes</h2>

            <!-- Mostrar mensajes de éxito -->
            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Mostrar mensajes de error -->
            @if(session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Mostrar la tabla de pedidos si existen -->
            @if(isset($pedidos) && $pedidos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center align-middle" id="elementoPDF">
                        <thead class="table-light">
                            <tr>
                                <th>ID del Pedido</th>
                                <th>ID Usuario</th>
                                <th>Total ($)</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pedidos as $pedido)
                                <tr>
                                    <td>{{ $pedido->id }}</td>
                                    <td>{{ $pedido->user_id }}</td>
                                    <td>{{ number_format($pedido->total, 2) }} $</td>
                                    <td>{{ ucfirst($pedido->estado) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($pedido->created_at)) }}</td>
                                    <td>
                                        <button 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalModificarPedido"        
                                            class="btn btn-outline-primary btn-sm"
                                            data-id="{{ $pedido->id }}"
                                            onclick="showModalModificarPedido(this)">
                                            Cambiar estado
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info text-center">
                    No hay pedidos existentes para mostrar.
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal para cambiar estado -->
@include('components.modalModificarPedido')

<script>
    function showModalModificarPedido(btn) {
        let actionCorrecto = window.location.protocol + "//" + window.location.host + "/pedidos/" + btn.dataset.id;
        $('#formModificarPedido').attr('action', actionCorrecto);
    }
</script>

@endsection
