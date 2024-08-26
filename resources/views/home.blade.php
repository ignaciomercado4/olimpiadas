@extends('layout.basicLayout')

@section('title', 'Home')
@section('navTitle', 'Inicio')

@section('body')

@if (Auth::user()->isAdmin == 1)
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Crear Producto -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="{{ route('viewFormCrearProducto') }}" class="text-decoration-none text-dark">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="bi bi-plus-circle" style="width: 60px; height: 60px;">
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h5 class="card-title">Crear Producto</h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Ver Productos -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="{{ route('productosExistentes') }}" class="text-decoration-none text-dark">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="bi bi-box" style="width: 60px; height: 60px;">
                                    <path d="M19.5 21a3 3 0 0 0 3-3v-4.5a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h15ZM1.5 10.146V6a3 3 0 0 1 3-3h5.379a2.25 2.25 0 0 1 1.59.659l2.122 2.121c.14.141.331.22.53.22H19.5a3 3 0 0 1 3 3v1.146A4.483 4.483 0 0 0 19.5 9h-15a4.483 4.483 0 0 0-3 1.146Z" />
                                </svg>
                            </div>
                            <h5 class="card-title">Ver Productos</h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Ver Pedidos -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="{{ route('viewPedidos') }}" class="text-decoration-none text-dark">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="bi bi-receipt" style="width: 60px; height: 60px;">
                                    <path d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 1 1 6 0h3a.75.75 0 0 0 .75-.75V15Z" />
                                    <path d="M8.25 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0ZM15.75 6.75a.75.75 0 0 0-.75.75v11.25c0 .087.015.17.042.248a3 3 0 0 1 5.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 0 0-3.732-10.104 1.837 1.837 0 0 0-1.47-.725H15.75Z" />
                                    <path d="M19.5 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                                </svg>
                            </div>
                            <h5 class="card-title">Ver Pedidos</h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Ver Usuarios -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="{{ route('gestion-usuarios') }}" class="text-decoration-none text-dark">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4" style="width: 60px; height: 60px;">
                                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                </svg>                                  
                            </div>
                            <h5 class="card-title">Ver Usuarios</h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Ver Ventas -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="{{ route('viewVentas') }}" class="text-decoration-none text-dark">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="bi bi-currency-exchange" style="width: 60px; height: 60px;">
                                    <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-.786-.394V6Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h5 class="card-title">Ver Ventas</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@else

    <!-- Ver Productos -->
    <script type="text/javascript">
        window.location.href = window.location.protocol + "//" + window.location.host + "/productosExistentes/";
    </script>
@endif

@endsection
