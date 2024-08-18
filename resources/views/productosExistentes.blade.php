@if (Auth::user()->isAdmin == 1)
    @include('productosExistentesCliente')
@else
    @include('productosExistentesAdmin')
@endif