<div class="modal" tabindex="-1" id="modalEliminarVenta">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar Venta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="" method="POST" id="formEliminarVenta">
            @method('delete')
            @csrf

            <p class="text-warning">
                    ¿Está seguro que desea eliminar este registro de venta?
            </p>
            <label for="id" class="label">
              ID:
            </label>
            <input type="text" name="id" id="eliminarIDInput" placeholder="ID" value="" class="form-control" disabled>
            <label for="fecha_venta" class="label">
              Fecha de creación:
            </label>
            <input type="text" name="fecha_venta" id="eliminarFechaInput" placeholder="Codigo" value="" class="form-control" disabled>
            <label for="total_venta" class="label">
              Total:
            </label>
            <input type="text" name="titulo" id="eliminarTotalInput" placeholder="Titulo" value="" class="form-control" disabled>
            <label for="comprador_venta" class="label">
              Comprador:
            </label>
            <input type="text" name="descripcion" id="eliminarCompradorInput" placeholder="Descripcion"  class="form-control" value="" disabled>
            <label for="numero_pedido" class="label">
              Número de pedido:
            </label>
            <input type="text" name="precio_unitario" id="eliminarNumeroPedidoInput" placeholder="Precio" class="form-control" value="" disabled>
            <label for="direccion" class="label">
              Dirección:
            </label>
            <input type="text" name="fecha" id="eliminarDireccionInput" placeholder="Fecha" class="form-control" value="" disabled>
            <p class="text-danger pt-3" style="text-align:end; font-weight:bold">
                    Esta acción no se puede deshacer.
            </p>
        </form>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-danger" onclick="submitFormEliminarVenta()">Eliminar Venta</button>
        </div>
      </div>
    </div>
  </div>
  
  <script>
    function submitFormEliminarVenta() {
              const formEliminarVenta = document.querySelector('#formEliminarVenta');
              formEliminarVenta.submit();
          }
  </script>