
<div style="font-size: 14px">
    <table class="table-bordered" id="elementoPDF" style="background-color: white; box-shadow: 1px -2px 43px 0px rgba(255,255,255,0.75);
-webkit-box-shadow: 1px -2px 43px 0px rgba(255,255,255,0.75);
-moz-box-shadow: 1px -2px 43px 0px rgba(255,255,255,0.75);">
        <tr class="text-center">
            <th>
                ID
            </th>
            <th>
                Código producto
            </th>
            <th>
                Título
            </th>
            <th>
                Descripción
            </th>
            <th>
                Precio unitario
            </th>
            <th>
                Fecha de creación
            </th>
            <th>
                Stock
            </th>
            <th>
                Acciones
            </th>
        </tr>
        @foreach($productosExistentes as $producto)
            <tr class="text-center">
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->codigo_producto }}</td>
                <td>{{ $producto->titulo }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->precio_unitario }}</td>
                <td>{{ $producto->stock }}</td>
                <td>{{ date('d/m/Y', strtotime($producto->created_at)) }}</td>
                <td>
                    <button 
                    data-bs-toggle="modal" 
                    data-bs-target="#modalModificarProducto"        
                    class="btn btn-primary m-1"
                    style="font-size: 12px;"
                    data-id="{{$producto->id}}"
                    data-codigo="{{$producto->codigo_producto}}"
                    data-stock="{{$producto->stock}}"
                    data-titulo="{{$producto->titulo}}"
                    data-descripcion="{{$producto->descripcion}}"
                    data-precio="{{$producto->precio_unitario}}"
                    data-fecha="{{ date('d/m/Y', strtotime(($producto->created_at))) }}"
                    onclick="mostrarModalModificar(this)">
                        Modificar
                    </button>
    
                    
                    <button 
                    data-bs-toggle="modal" 
                    data-bs-target="#modalEliminarProducto"        
                    class="btn btn-danger m-1"
                    style="font-size: 12px;"
                    data-id="{{$producto->id}}"
                    data-codigo="{{$producto->codigo_producto}}"
                    data-stock="{{$producto->stock}}"
                    data-titulo="{{$producto->titulo}}"
                    data-descripcion="{{$producto->descripcion}}"
                    data-precio="{{$producto->precio_unitario}}"
                    data-fecha="{{ date('d/m/Y', strtotime(($producto->created_at))) }}"
                    onclick="mostrarModalEliminar(this)">
                        Eliminar
                    </button>
                </td>
        @endforeach
    </table>
    
    {{-- jquery cdn --}}
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
        
    @include('components.modalModificarProducto')
    @include('components.modalEliminarProducto')

    <script>
        function mostrarModalModificar(btn) {
            let actionCorrecto = window.location.protocol + "//" + window.location.host + "/modificarProducto/" + btn.dataset.id;
            $('#formModificarProducto').attr('action', actionCorrecto);

            $('#modificarIDInput').val(btn.dataset.id);
            $('#modificarCodigoInput').val(btn.dataset.codigo);
            $('#modificarTituloInput').val(btn.dataset.titulo);
            $('#modificarDescripcionInput').val(btn.dataset.descripcion);
            $('#modificarPrecioInput').val(btn.dataset.precio);
            $('#modificarStockInput').val(btn.dataset.stock);
            $('#modificarFechaInput').val(btn.dataset.fecha);

            $('#modalModificarProducto').show();
        }

        
        function mostrarModalEliminar(btn) {
            let actionCorrecto = window.location.protocol + "//" + window.location.host + "/eliminarProducto/" + btn.dataset.id;
            $('#formEliminarProducto').attr('action', actionCorrecto);

            $('#eliminarIDInput').val(btn.dataset.id);
            $('#eliminarCodigoInput').val(btn.dataset.codigo);
            $('#eliminarTituloInput').val(btn.dataset.titulo);
            $('#eliminarDescripcionInput').val(btn.dataset.descripcion);
            $('#eliminarPrecioInput').val(btn.dataset.precio);
            $('#eliminarStockInput').val(btn.dataset.stock);
            $('#eliminarFechaInput').val(btn.dataset.fecha);

            $('#modalEliminarProducto').show();
        }
    </script>
    
</div>