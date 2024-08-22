@extends('layout.basicLayout')

@section('title', 'Login')
@section('navTitle', 'Login')


@section('body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="d-flex justify-content-center align-items-center vh-700">
        <div class="container bg-light rounded-4 w-25 p-5 mb-5 mt-5"id="card" style="height: 30vw">
            <h1 class="text-center mb-5">Bienvenido</h1>
            <form action="{{ route('inicia-sesion') }}" method="POST" id="loginForm">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label mt-3">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Introduce tu email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label mt-3">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Introduce tu contraseña">
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <div class="text-center mt-3 pt-4">

                ¿No tenés cuenta? 
                <a href="{{ route('viewRegister') }}"> Registrate acá.</a>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function submitLoginForm() {
            const loginForm = document.querySelector('#loginForm');
            loginForm.submit();
        }
    </script>

    <style>
    .container {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

@endsection