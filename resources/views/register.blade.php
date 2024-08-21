@extends('layout.basicLayout')

@section('title', 'Registro')
@section('navTitle', 'Registro')

@section('body')
    <div class="pt-4 d-flex justify-content-center">
        <div class="card shadow p-4 m-3" style="width: 400px; border-radius: 15px;">
            <h1 class="text-center mb-5">
                Registro
            </h1>
            <form action="{{ route('validar-registro') }}" method="POST" id="registerForm">
                @method('post')
                @csrf

                <div class="form-group">
                    <label for="email" class="label">
                        Ingrese su email:
                    </label>
                    <input type="email" name="email" id="emailInput" placeholder="Ingrese su email" class="form-control m-1">
                </div>

                <div class="form-group">
                    <label for="name" class="label">
                        Ingrese su nombre de usuario:
                    </label>
                    <input type="text" name="name" id="nameInput" placeholder="Ingrese su nombre de usuario" class="form-control m-1">
                </div>

                <div class="form-group">
                    <label for="direccion" class="label">
                        Ingrese su direccion:
                    </label>
                    <input type="text" name="direccion" id="direccionInput" placeholder="Ingrese su dirección" class="form-control m-1">
                </div>

                <div class="form-group">
                    <label for="password" class="label">
                        Ingrese su contraseña:
                    </label>
                    <input type="password" name="password" id="passwordInput" placeholder="Ingrese su contraseña" class="form-control m-1">
                </div>

                <p class="text-danger" id="textoError">
                    {{-- texto de error --}}
                </p>

                <!-- Centrar el botón -->
                <div class="d-flex justify-content-center">
                    <button type="button" onclick="submitRegisterForm()" class="btn btn-primary m-2">
                        Ingresar
                    </button>
                </div>
            </form>

            <p class="mt-3 text-center">
                ¿Ya te registraste? hacé click
                <a href="{{ route('viewLogin') }}">
                    acá.
                </a>
            </p>
        </div>
    </div>

    <script type="text/javascript">
        function submitRegisterForm() {
            const registerForm = document.querySelector('#registerForm');
            const password = document.querySelector('#passwordInput');
            const textoError = document.querySelector('#textoError');
            const regex = /^[A-Za-z0-9]{8,}$/;
            const passwordValue = password.value;

            if (regex.test(passwordValue)) {
                registerForm.submit();
            } else {
                textoError.textContent = "";
                textoError.textContent = "La contraseña que elegiste no cumple con los requisitos. (Caracteres A-z, 0-9)";
            }
        }
    </script>

    <style>
        .container {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
