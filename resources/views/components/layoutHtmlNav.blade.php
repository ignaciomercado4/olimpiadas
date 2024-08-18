@php
    use Illuminate\Support\Facades\Auth;
@endphp

<div class="container-fluid bg-primary text-dark d-flex justify-content-between align-items-center">
    <h1 class="pb-1 mb-0">
        @yield('navTitle')
    </h1>
    @auth
        <a href="{{ route('logout') }}" class="text-dark">
            Cerrar Sesión
        </a>
        @if (Auth::user()->isAdmin == 0 && !request()->routeIs('cart-index'))
            <a href="{{ route('cart-index') }}" class="text-dark">
                Ver carrito
            </a>
        @endif
    @endauth
    
</div>
