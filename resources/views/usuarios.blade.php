@extends('layout.basicLayout')

@section('title', 'Usuarios')
@section('navTitle', 'Usuarios')

@section('body')
<div class="container mt-4">
    @if (Auth::user()->isAdmin == 1)
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Usuarios existentes:</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Fecha de Creación</th>
                                <th>Dirección</th>
                                <th>Es administrador:</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                                    <td>{{ $user->direccion }}</td>
                                    <td>
                                        @if ($user->isAdmin)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>
                                        <button 
                                            class="btn btn-primary btn-sm m-1" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalModificarUsuario" 
                                            data-id="{{ $user->id }}"
                                            data-name="{{ $user->name }}"
                                            data-email="{{ $user->email }}"
                                            data-direccion="{{ $user->direccion }}"
                                            data-admin="{{ $user->isAdmin }}"
                                            onclick="mostrarModalModificarUsuario(this)"
                                            >
                                            Modificar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('components.modalModificarUsuario')
        
    @else
        @include('components.usuarioNoAutorizado')
    @endif
</div>

    {{-- jquery cdn --}}
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
    
<script>
    function mostrarModalModificarUsuario(btn) {
        let actionCorrecto = window.location.protocol + "//" + window.location.host + "/modificarUsuario/" + btn.dataset.id;
        $('#formModificarUsuario').attr('action', actionCorrecto);

        $('#modificarNombreInput').val(btn.dataset.name);
        $('#modificarDireccionInput').val(btn.dataset.direccion);
        $('#modificarEmailInput').val(btn.dataset.email);
        $('#modificarAdminInput').val(btn.dataset.email);

        $('#modalModificarUsuario').modal('show');
    }
</script>
@endsection
