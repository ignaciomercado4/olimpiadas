@extends('layout.basicLayout')

@section('title', 'Home')
@section('navTitle', 'Inicio')

@section('body') 

@if (Auth::user()->isAdmin == 1)

    <div class="container mt-4">
        <div class="row text-center">
            <!-- Crear Producto -->
            <div class="col-md-4">
                <a href="{{ route('viewFormCrearProducto') }}" class="card-link">
                    <div class="card border-primary">
                        <div class="card-body">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4" style="width: 60px; height: 60px;">
                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                            </svg>                      
                            <h3 class="mt-2">Crear Producto</h3>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Ver Productos -->
            <div class="col-md-4">
                <a href="{{ route('productosExistentes') }}" class="card-link">
                    <div class="card border-primary">
                        <div class="card-body">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4" style="width: 60px; height: 60px;">
                                <path d="M19.5 21a3 3 0 0 0 3-3v-4.5a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h15ZM1.5 10.146V6a3 3 0 0 1 3-3h5.379a2.25 2.25 0 0 1 1.59.659l2.122 2.121c.14.141.331.22.53.22H19.5a3 3 0 0 1 3 3v1.146A4.483 4.483 0 0 0 19.5 9h-15a4.483 4.483 0 0 0-3 1.146Z" />
                            </svg>                          
                            <h3 class="mt-2">Ver Productos</h3>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Ver Pedidos -->
            <div class="col-md-4">
                <a href="" class="card-link">
                    <div class="card border-primary">
                        <div class="card-body">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4" style="width: 60px; height: 60px;">
                                <path d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 1 1 6 0h3a.75.75 0 0 0 .75-.75V15Z" />
                                <path d="M8.25 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0ZM15.75 6.75a.75.75 0 0 0-.75.75v11.25c0 .087.015.17.042.248a3 3 0 0 1 5.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 0 0-3.732-10.104 1.837 1.837 0 0 0-1.47-.725H15.75Z" />
                                <path d="M19.5 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                            </svg>                          
                            <h3 class="mt-2">Ver Pedidos</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@else
        
    <div class="col-md-4">
        <a href="{{ route('productosExistentes') }}" class="card-link">
            <div class="card border-primary">
                <div class="card-body">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4" style="width: 60px; height: 60px;">
                        <path d="M19.5 21a3 3 0 0 0 3-3v-4.5a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h15ZM1.5 10.146V6a3 3 0 0 1 3-3h5.379a2.25 2.25 0 0 1 1.59.659l2.122 2.121c.14.141.331.22.53.22H19.5a3 3 0 0 1 3 3v1.146A4.483 4.483 0 0 0 19.5 9h-15a4.483 4.483 0 0 0-3 1.146Z" />
                    </svg>                          
                    <h3 class="mt-2">Ver Productos</h3>
                </div>
            </div>
        </a>
    </div>

@endif

@endsection
