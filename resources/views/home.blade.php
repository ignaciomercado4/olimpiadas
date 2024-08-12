@extends('layout.basicLayout')

@section('title', 'Home')

@section('body')
<div class="container-fluid bg-primary text-dark">
    <h1 class="pb-1">
        Home
    </h1>
    <a href="{{ route('logout') }}" class="text-black">
        Cerrar sesión
    </a>
</div>

<h1>Home</h1>
<h2>Esto es un home de ejemplo</h2>
@endsection