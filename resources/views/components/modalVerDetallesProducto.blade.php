<!-- Modal para mostrar los detalles del producto -->
<div class="modal fade" id="productModal{{ $producto->id }}" tabindex="-1" aria-labelledby="productModalLabel{{ $producto->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel{{ $producto->id }}">{{ $producto->titulo }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Imagen del producto en tamaño completo -->
                        @if($producto->imagen)
                        <img src="{{ asset('/' . $producto->imagen) }}" class="img-fluid" alt="{{ $producto->titulo }}">
                        @else
                        <img src="https://via.placeholder.com/500" class="img-fluid" alt="Imagen no disponible">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title">{{ $producto->titulo }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text"><strong>Precio:</strong> ${{ $producto->precio_unitario }}</p>
                        <p class="card-text"><strong>Stock:</strong>
                            @if ($producto->stock > 0)
                                {{ $producto->stock }}
                            @else
                                Sin stock
                            @endif
                        </p>
                        <form action="{{ route('cart-add', $producto->id) }}" method="POST">
                            @csrf
                            @if ($producto->stock >= 0)
                                <p class="text-warning fw-bold">
                                    No hay stock de este producto, ¡lo sentimos!
                                </p>
                                <button type="submit" class="btn btn-success" disabled>Agregar al carrito</button>
                            @else
                                <button type="submit" class="btn btn-success">Agregar al carrito</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>