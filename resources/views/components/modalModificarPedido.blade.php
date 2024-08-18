<div class="modal fade" id="modalModificarPedido" tabindex="-1" aria-labelledby="modalModificarPedidoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarPedidoLabel">Cambiar Estado del Pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-warning">
                    ¡Si cambias el estado del pedido a entregado, se tomará como venta realizada!
                </p>
                <!-- contenido del modal para cambiar el estado del pedido -->
                <form action="" id="formModificarPedido" method="POST">
                    @csrf
                    @method('put')
                    <label for="estado" class="label">
                        Estado del pedido:
                    </label>
                    <select name="estado" id="inputModificarEstado" class="form-control">
                        <option value="pendiente">Pendiente</option>
                        <option value="entregado">Entregado</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button 
                type="button" 
                class="btn btn-secondary" 
                data-bs-dismiss="modal">
                    Cancelar
                </button>
                <button 
                type="button" 
                class="btn btn-primary" 
                onclick="submitFormModificarPedido()">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>

    {{-- jquery cdn --}}
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<script>
    function submitFormModificarPedido() {
        
        $('#formModificarPedido').submit();
    }
</script>