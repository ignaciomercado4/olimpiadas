@php
    use Illuminate\Support\Facades\Auth;
    use App\Models\Cart;

    if (Auth::user()->isAdmin == 0 && !request()->routeIs('cart-index')) {
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();
        $cartItemAmount = 0;

        for ($i = 0; $i < sizeof($cartItems); $i++) {
            $cartItemAmount += $cartItems[$i]->quantity; 
        }
    }

@endphp

<div class="container-fluid bg-primary text-white py-3">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <!-- Botón para volver atrás -->
            <a href="{{ url()->previous() }}" class="btn btn-outline-light me-2">
                <- Atrás
            </a>

            <!-- Botón para volver al inicio -->
            @auth
            <a href="{{ url('/') }}" class="btn btn-outline-light me-2">
                Inicio
            </a>
            @endauth

            <h1 class="h4 mb-0">
                @yield('navTitle')
            </h1>
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
