<div class="modal" tabindex="-1" id="modalModificarProducto">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modificar producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="formModificarProducto" enctype="multipart/form-data">
          @method('PUT')
          @csrf


          <label for="id" class="label">
            ID:
          </label>
          <input type="text" name="id" id="modificarIDInput" placeholder="ID" value="" class="form-control" disabled>
          <label for="codigo_producto" class="label">
            Código producto:
          </label>
          <input type="text" name="codigo_producto" id="modificarCodigoInput" placeholder="Codigo" value="" class="form-control" disable>
          <label for="titulo" class="label">
            Título:
          </label>
          <input type="text" name="titulo" id="modificarTituloInput" placeholder="Titulo" value="" class="form-control">
          <label for="descripcion" class="label">
            Descripción:
          </label>
          <input type="text" name="descripcion" id="modificarDescripcionInput" placeholder="Descripcion"  class="form-control" value="">
          <label for="precio_unitario" class="label">
            Precio unitario:
          </label>
          <label for="categoria" class="label">
            Categoría:
          </label>
          <input type="text" name="categoria" id="modificarCategoriaInput" placeholder="Categoría" class="form-control" value="" disabled>
          <input type="text" name="precio_unitario" id="modificarPrecioInput" placeholder="Precio" class="form-control" value="">
          <label for="fecha" class="label">
            Fecha de creación:
          </label>
          <input type="text" name="fecha" id="modificarFechaInput" placeholder="Fecha" class="form-control" value="" disabledº>
          <label for="stock" class="label">
            Stock:
          </label>
          <input type="number" name="stock" id="modificarStockInput" placeholder="Stock" class="form-control" value="" disabledº>
          <label for="imagen" class="label">
            Imagen:
          </label>
          <input type="file" name="imagen" id="modificarImagenInput" class="form-control" value="">
      </form>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="submitFormModificarProducto()">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>

<script>
  function submitFormModificarProducto() {
            const formModificarProducto = document.querySelector('#formModificarProducto');
            formModificarProducto.submit();
        }
</script>