@php
    use Illuminate\Support\Facades\Auth;
    use App\Models\Cart;

    $cartItemAmount = 0;

    if (Auth::check() && Auth::user()->isAdmin == 0 && !request()->routeIs('cart-index')) {
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();

        foreach ($cartItems as $item) {
            $cartItemAmount += $item->quantity;
        }
    }
@endphp

<div class="container-fluid text-white py-3" style="background-color: #3d8db5;">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <!-- Botón para volver atrás -->
            @auth
                <a href="{{ url()->previous() }}" class="btn btn-outline-light me-2">
                    <- Atrás
                </a>
            @endauth

            <!-- Botón para volver al inicio -->
            @if (Auth::user())
                <a href="{{ url('/') }}" class="me-2 text-light d-flex align-items-center" style="text-decoration: none;">
                    <img src="{{ asset('/img/logo.png') }}" alt="Inicio" style="width: 50px; height: 50px;">
                    <span class="ms-2" style="font-family: 'system-ui', sans-serif; font-weight: bold; font-size: 1.5rem; color: #0a3662;">
                        Paraná
                    </span>
                    <span class="ms-2" style="font-family: 'system-ui', sans-serif; font-weight: bold; font-size: 1.5rem; color: #7e1313;">
                        Sports
                    </span>
                </a>
            @else
                <a href="#" class="me-2 text-light d-flex align-items-center" style="text-decoration: none;">
                    <img src="{{ asset('/img/logo.png') }}" alt="Inicio" style="width: 50px; height: 50px;">
                    <span class="ms-2" style="font-family: 'system-ui', sans-serif; font-weight: bold; font-size: 1.5rem; color: #0a3662;">
                        Paraná
                    </span>
                    <span class="ms-2" style="font-family: 'system-ui', sans-serif; font-weight: bold; font-size: 1.5rem; color: #7e1313;">
                        Sports
                    </span>
                </a>
            @endif

            <h4 class="mb-0">
                 -    
                @yield('navTitle')
            </h4>
        </div>

        <div>
            @auth    
                
            <!-- Ver carrito para usuarios no admin -->
                @if (Auth::user()->isAdmin == 0 && !request()->routeIs('cart-index'))
                    <a href="{{ route('cart-index') }}" class="btn btn-outline-light me-2">
                        Carrito 🛒
                        {{ $cartItemAmount }}
                    </a>
                @endif

                <!-- Botón de cerrar sesión -->
                <a href="{{ route('logout') }}" class="btn btn-danger">
                    Cerrar Sesión
                </a>
            
            @endauth
        </div>
    </div>
</div>
