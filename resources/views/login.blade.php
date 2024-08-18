@extends('layout.basicLayout')

@section('title', 'Login')
@section('navTitle', 'Login')


@section('body')

    <form action="{{ route('inicia-sesion') }}" method="POST" id="loginForm">
        @method('POST')
        @csrf
        
        <label for="email" class="label">
            Ingrese su email:
        </label>
        <input type="text" name="email" id="emailInput" placeholder="Ingrese su email" class="form-control m-1">

        <label for="password" class="label">
            Ingrese su contraseña:
        </label>
        <input type="password" name="password" id="passwordInput" placeholder="Ingrese su contraseña" class="form-control m-1">

        <button onclick="submitLoginForm()" class="btn btn-primary m-2">
            Ingresar
        </button>
    </form>

    <p>
        ¿Todavía no te registraste? hacé click 
        <a href="{{ route('viewRegister') }}">
            acá.
        </a>
    </p>

    <script type="text/javascript">
        function submitLoginForm() {
            const loginForm = document.querySelector('#loginForm');
            loginForm.submit();
        }
    </script>
@endsection