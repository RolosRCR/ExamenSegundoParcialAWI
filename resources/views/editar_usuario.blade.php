<!-- Modal Editar -->
<div class="modal fade" id="editarModal{{ $usuario->id_usuario }}" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel{{ $usuario->id_usuario }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel{{ $usuario->id_usuario }}">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('usuarios.actualizar', $usuario->id_usuario) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{ $usuario->nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="rol">Rol</label>
                        <select class="form-control" name="rol" required>
                            <option value="1" {{ $usuario->rol == 1 ? 'selected' : '' }}>Administrador</option>
                            <option value="2" {{ $usuario->rol == 2 ? 'selected' : '' }}>Bibliotecario</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" placeholder="Cambiar contraseña (opcional)">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
