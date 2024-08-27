<!-- Sidebar de Filtros -->
<div id="filterSidebar" class="sidebar">
    <button id="closeSidebar" class="btn position-absolute end-0 me-2">
        X
    </button>
    <form action="{{ route('productosExistentes') }}" method="GET" class="mt-4 ml-2">
        <h5>Filtrar por Categoría</h5>
        <div class="form-group">
            @foreach($categoriasDisponibles as $categoria)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="categoria[]" value="{{ $categoria }}" id="categoria{{ $loop->index }}"
                            {{ in_array($categoria, $categoriasFiltradas) ? 'checked' : '' }}>
                    <label class="form-check-label" for="categoria{{ $loop->index }}">
                        {{ $categoria }}
                    </label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary mt-3">
            Filtrar
        </button>
    </form>
</div>

<style>
    .sidebar {
    width: 300px;
    position: fixed;
    top: 0;
    left: -300px; 
    height: 100%;
    z-index: 1050;
    background-color: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(10px);
    overflow-y: auto;
    transition: left 0.3s ease;
    padding-top: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding-right: 10px; /* Ajusta el padding para la X */
}

.btn.position-absolute.end-0 {
    top: 10px; /* Ajusta la distancia desde el borde superior */
}

.sidebar form {
    padding-top: 40px; /* Espacio para la X */
}

.sidebar .btn-primary {
    display: block;
    margin: 0 auto;
}

</style>
