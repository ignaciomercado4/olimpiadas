@extends('layout.basicLayout')

@section('title', 'Registro')

@section('body')
    <div class="container-fluid bg-primary text-dark">
        <h1 class="pb-1">
            Registro
        </h1>
    </div>

    <form action="{{ route('validar-registro') }}" method="POST" id="registerForm">
        @method('post')
        @csrf

        <label for="email" class="label">
            Ingrese su email:
        </label>
        <input type="email" name="email" id="emailInput" placeholder="Ingrese su email" class="form-control m-1">

        <label for="name" class="label">
            Ingrese su nombre de usuario:
        </label>
        <input type="text" name="name" id="nameInput" placeholder="Ingrese su nombre de usuario" class="form-control m-1">

        <label for="password" class="label">
            Ingrese su contraseña:
        </label>
        <input type="password" name="password" id="passwordInput" placeholder="Ingrese su contraseña" class="form-control m-1">

        <button onclick="submitRegisterForm()" class="btn btn-primary m-2">
            Ingresar
        </button>
    </form>

    <p>
        ¿Ya te registraste? hacé click 
        <a href="{{ route('viewLogin') }}">
            acá.
        </a>
    </p>

    <script type="text/javascript">
        function submitRegisterForm() {
            const registerForm = document.querySelector('#registerForm');
            registerForm.submit();
        }
    </script>
@endsection