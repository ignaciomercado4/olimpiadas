<div class="modal" tabindex="-1" id="modalEliminarProducto">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="" method="POST" id="formEliminarProducto">
            @method('delete')
            @csrf
  
            <label for="id" class="label">
              ID:
            </label>
            <input type="text" name="id" id="eliminarIDInput" placeholder="ID" value="" class="form-control" disabled>
            <label for="codigo_producto" class="label">
              Código producto:
            </label>
            <input type="text" name="codigo_producto" id="eliminarCodigoInput" placeholder="Codigo" value="" class="form-control" disabled>
            <label for="titulo" class="label">
              Título:
            </label>
            <input type="text" name="titulo" id="eliminarTituloInput" placeholder="Titulo" value="" class="form-control" disabled>
            <label for="descripcion" class="label">
              Descripción:
            </label>
            <input type="text" name="descripcion" id="eliminarDescripcionInput" placeholder="Descripcion"  class="form-control" value="" disabled>
            <label for="precio_unitario" class="label">
              Precio unitario:
            </label>
            <input type="text" name="precio_unitario" id="eliminarPrecioInput" placeholder="Precio" class="form-control" value="" disabled>
            <label for="fecha" class="label">
              Fecha de creación:
            </label>
            <input type="text" name="fecha" id="eliminarFechaInput" placeholder="Fecha" class="form-control" value="" disabled>
            <label for="stock" class="label">
              Stock:
            </label>
            <input type="number" name="stock" id="eliminarStockInput" placeholder="Stock" value="" class="form-control" disabled>
        </form>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-danger" onclick="submitFormEliminarProducto()">Eliminar producto</button>
      </
        </div>
      </div>
    </div>
  </div>
  
  <script>
    function submitFormEliminarProducto() {
              const formEliminarProducto = document.querySelector('#formEliminarProducto');
              formEliminarProducto.submit();
          }
  </script>