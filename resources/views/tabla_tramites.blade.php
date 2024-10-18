<div class="container mt-5">
    <h2>Lista de Trámites</h2>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>ID Trámite</th>
                <th>ID Libro</th>
                <th>ID Beneficiario</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tramites as $tramite)
                <tr>
                    <td>{{ $tramite->id_tramite }}</td>
                    <td>{{ $tramite->id_libro }}</td>
                    <td>{{ $tramite->id_beneficiario }}</td>
                    <td>{{ $tramite->fecha }}</td>
                    <td>{{ $tramite->tipo == 1 ? 'Prestado' : 'Entregado' }}</td>
                    <td>
                        <!-- Botón Editar con Modal -->
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarModal{{ $tramite->id_tramite }}">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <!-- Modal Editar -->
                        <div class="modal fade" id="editarModal{{ $tramite->id_tramite }}" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel{{ $tramite->id_tramite }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarModalLabel{{ $tramite->id_tramite }}">Editar Trámite</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('tramites.actualizar', $tramite->id_tramite) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="id_libro">ID Libro</label>
                                                <input type="number" class="form-control" name="id_libro" value="{{ $tramite->id_libro }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="id_beneficiario">ID Beneficiario</label>
                                                <input type="number" class="form-control" name="id_beneficiario" value="{{ $tramite->id_beneficiario }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="fecha">Fecha</label>
                                                <input type="date" class="form-control" name="fecha" value="{{ $tramite->fecha }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tipo">Tipo</label>
                                                <select class="form-control" name="tipo" required>
                                                    <option value="1" {{ $tramite->tipo == 1 ? 'selected' : '' }}>Prestado</option>
                                                    <option value="2" {{ $tramite->tipo == 2 ? 'selected' : '' }}>Entregado</option>
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
                        <form action="{{ route('tramites.eliminar', $tramite->id_tramite) }}" method="POST" style="display:inline;">
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
