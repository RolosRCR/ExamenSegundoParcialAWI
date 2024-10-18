<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Agregar Libro</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Libros</h2>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                    <tr>
                        <td>{{ $libro->id_libro }}</td>
                        <td>{{ $libro->nombre }}</td>
                        <td>{{ $libro->estado == 1 ? 'En posesión' : 'Prestado' }}</td>
                        <td>
                            <!-- Botón Editar con Modal -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarModal{{ $libro->id_libro }}">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <!-- Modal Editar -->
                            <div class="modal fade" id="editarModal{{ $libro->id_libro }}" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel{{ $libro->id_libro }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarModalLabel{{ $libro->id_libro }}">Editar Libro</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('libros.actualizar', $libro->id_libro) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre</label>
                                                    <input type="text" class="form-control" name="nombre" value="{{ $libro->nombre }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="estado">Estado</label>
                                                    <select class="form-control" name="estado" required>
                                                        <option value="1" {{ $libro->estado == 1 ? 'selected' : '' }}>En posesión</option>
                                                        <option value="2" {{ $libro->estado == 2 ? 'selected' : '' }}>Prestado</option>
                                                    </select>
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
                        </td>
                        <td>
                            <form action="{{ route('libros.eliminar', $libro->id_libro) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
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
