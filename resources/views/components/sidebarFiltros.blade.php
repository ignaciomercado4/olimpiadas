<!-- Sidebar -->
<div id="filterSidebar" class="sidebar bg-light shadow-lg p-4 rounded">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0">Filtrar por Categoría</h5>
        <button id="closeSidebar" class="btn-close"></button>
    </div>
    <form id="filter-form" method="GET" action="{{ route('productosExistentes') }}">
        <ul class="list-group list-group-flush">
            @foreach ($categoriasDisponibles as $categoria)
                <li class="list-group-item bg-transparent border-0">
                    <input type="checkbox" name="categoria[]" value="{{ $categoria }}" id="cat{{ $categoria }}" class="form-check-input">
                    <label for="cat{{ $categoria }}" class="form-check-label">{{ $categoria }}</label>
                </li>
            @endforeach
        </ul>
        <button type="submit" id="filter-button" class="btn btn-primary mt-3 w-100">Aplicar Filtros</button>
    </form>
</div>
