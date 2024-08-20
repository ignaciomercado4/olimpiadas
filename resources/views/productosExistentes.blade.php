@if (Auth::user()->isAdmin == 1)
    @include('productosExistentesAdmin')    
@else
    @include('productosExistentesCliente')
@endif