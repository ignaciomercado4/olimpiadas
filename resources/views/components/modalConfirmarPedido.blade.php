<!-- Modal de confirmación -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmación de Pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                El equipo de ventas de ParanáSports se comunicará a su email 
                <span class="text-success fw-bolder">
                    {{ Auth::user()->email }}
                </span> 
                para coordinar el pago. Aceptamos todas las tarjetas de débito/crédito, transferencias bancarias y MercadoPago.
                <span class="fw-bolder">
                    ¡Gracias por confiar en nosotros!
                </span>
            </div>
            <div class="modal-footer">
                <form action="{{ route('cart-save-pedido') }}" method="POST" id="savePedidoForm">
                    @csrf
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">OK</button>
                </form>
            </div>
        </div>
    </div>
</div>