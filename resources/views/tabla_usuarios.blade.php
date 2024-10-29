<!DOCTYPE html>
<html lang="es">

<head>
    
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">            
            <title>Agregar Usuario</title>
        </head>

<body>
    <div class="container mt-5">
        <h2>Lista de Usuarios</h2>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id_usuario }}</td>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->rol == 1 ? 'Administrador' : 'Usuario' }}</td>
                        <td>
                            <!-- Botón Editar con Modal -->
                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#editarModal{{ $usuario->id_usuario }}">
                                <i class="fas fa-pencil-alt"></i>
                            </button>

                            <!-- Modal Editar -->
                            <div class="modal fade" id="editarModal{{ $usuario->id_usuario }}" tabindex="-1" role="dialog"
                                aria-labelledby="editarModalLabel{{ $usuario->id_usuario }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarModalLabel{{ $usuario->id_usuario }}">Editar
                                                Usuario</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('usuarios.actualizar', $usuario->id_usuario) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre</label>
                                                    <input type="text" class="form-control" name="nombre"
                                                        value="{{ $usuario->nombre }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="rol">Rol</label>
                                                    <select class="form-control" name="rol" required>
                                                        <option value="1" {{ $usuario->rol == 1 ? 'selected' : '' }}>
                                                            Administrador</option>
                                                        <option value="2" {{ $usuario->rol == 2 ? 'selected' : '' }}>Bibliotecario
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="contrasena">Contraseña</label>
                                                    <input type="password" class="form-control" name="contrasena"
                                                        placeholder="Cambiar contraseña (opcional)">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            
                            <form action="{{ route('usuarios.confirmarEliminacion', $usuario->id_usuario) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>