<div class="modal" tabindex="-1" id="modalEliminarPedido">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar pedido</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="" method="POST" id="formEliminarPedido">
            @method('delete')
            @csrf
            <label for="id">
                ¿Seguro que deseas eliminar el siguiente pedido?<br>
                ID Pedido:
            </label>
            <input type="text" name="id" id="idEliminarPedido">
        </form>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-danger" onclick="submitFormEliminarPedido()">Eliminar pedido</button>
      </
        </div>
      </div>
    </div>
  </div>
  
  <script>
    function submitFormEliminarPedido() {
              const formEliminarPedido = document.querySelector('#formEliminarPedido');
              formEliminarPedido.submit();
          }
  </script>