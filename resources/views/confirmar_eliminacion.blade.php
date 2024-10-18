<h1>¿Estás seguro que quieres eliminar a {{ $usuario->nombre }}?</h1>
<form action="{{ route('usuarios.eliminar', $usuario->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Sí, eliminar</button>
    <a href="{{ route('usuarios.index') }}">No, regresar</a>
</form>

<!--
<div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Iniciar Sesión</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="id_usuario">Clave</label>
                                <input type="number" class="form-control" id="id_usuario" name="id_usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
-->
