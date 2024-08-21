<!-- Modal para confirmar eliminación de un producto -->
<div class="modal fade" id="modalEliminarProductoCarrito" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Eliminar producto del carrito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEliminarProductoCarrito" method="POST" action="">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este producto del carrito?</p>
                    <input type="hidden" disabled name="cart_item_id" id="cartItemId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
