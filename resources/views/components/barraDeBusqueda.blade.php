<div class="row mb-4">
    <!-- Barra de Búsqueda -->
    <div class="col-md-6">
        <input type="text" id="search" class="form-control w-100" placeholder="🔎 Buscar productos...">
    </div>
    
    <!-- Mostrar Filtros Aplicados -->
    <div class="col-md-6 text-end">
        @foreach($categoriasFiltradas as $filtro)
            <form action="{{ route('productosExistentes') }}" method="GET" class="d-inline">
                <!-- Mantener los filtros existentes menos el actual -->
                @foreach($categoriasFiltradas as $categoria)
                    @if($categoria !== $filtro)
                        <input type="hidden" name="categoria[]" value="{{ $categoria }}">
                    @endif
                @endforeach
                <button type="submit" class="btn btn-outline-danger">
                    {{ $filtro }} <span>&times;</span>
                </button>
            </form>
        @endforeach

        <!-- Botón para abrir Sidebar -->
        <button id="openSidebar" class="btn btn-primary ms-2">
             + Agregar filtros
        </button>
    </div>
</div>
