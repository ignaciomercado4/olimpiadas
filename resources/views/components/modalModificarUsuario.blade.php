<!-- Modal Modificar Usuario -->
<div class="modal fade" id="modalModificarUsuario" tabindex="-1" aria-labelledby="modalModificarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarUsuarioLabel">Modificar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formModificarUsuario" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="modificarNombreInput" class="form-label">
                            Nombre
                        </label>
                        <input type="text" id="modificarNombreInput" class="form-control" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="modificarEmailInput" class="form-label">
                            Email
                        </label>
                        <input type="email" id="modificarEmailInput" class="form-control" name="email">
                    </div>
                    
                    <div class="mb-3">
                        <p class="text-danger">
                            <span class="fw-bold">
                                Atención:
                            </span> 
                            Al modificar este campo el usuario se convertirá en 
                            <span class="fw-bold">
                                administrador
                            </span>
                            teniendo acceso total a los datos de la empresa.
                        </p>
                        <label for="modificarAdminInput" class="form-label">Administrador:</label>
                        <select name="isAdmin" id="modificarAdminInput" class="from-control">
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

