@if (Auth::user()->isAdmin == 0)
    @include('productosExistentesCliente')
@else
    @include('productosExistentesAdmin')
@endif