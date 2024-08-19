@if (Auth::user()->isAdmin == 0)

    @include('productosExistentesAdmin')    
@else
    @include('productosExistentesCliente')
@endif