<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Agregar Trámite</title>
</head>

<body>
    @include('navbar')
    <div class="container">
        <h1>Crear Trámite</h1>
        <select class="form-control" id="id_beneficiario" name="id_beneficiario" required>
            @foreach ($beneficiarios as $beneficiario)
                <option value="{{ $beneficiario->id_beneficiario }}">{{ $beneficiario->beneficiario }}-{{ $beneficiario->nombre }}</option>
            @endforeach
            @foreach ($libros as $libro)
                <option value="{{ $libro->id_libro }}">{{ $libro->id_libro }} - {{ $libro->nombre }}</option>
            @endforeach
        </select>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="nuevoUsuarioCheck" name="nuevo_usuario">
            <label class="form-check-label" for="nuevoUsuarioCheck">Nuevo usuario?</label>
        </div>
        <div id="nuevoUsuarioForm" style="display:none;">
            <h3>Agregar Beneficiario</h3>
            <div class="form-group">
                <label for="id_beneficiario">ID Beneficiario</label>
                <input type="number" class="form-control" id="id_beneficiario" name="id_beneficiario" required>
            </div>
            <div class="form-group">
                <label for="nombre_beneficiario">Nombre</label>
                <input type="text" class="form-control" id="nombre_beneficiario" name="nombre_beneficiario" required>
            </div>
        </div>

        <form action="{{ route('tramites.guardar') }}" method="POST">
            @csrf




            <div id="tramiteForm">
                <h3>Datos del Trámite</h3>
                <div class="form-group">
                    <label for="id_libro">ID Libro</label>
                    <select class="form-control" id="id_libro" name="id_libro" required>
                        @foreach ($libros as $libro)
                            <option value="{{ $libro->id_libro }}">{{ $libro->id_libro }} - {{ $libro->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="tipoForm" class="form-group">
                    <label for="tipo">Tipo</label>
                    <select class="form-control" id="tipo" name="tipo" required>
                        <option value="1">Prestado</option>
                        <option value="2">Entregado</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Crear Trámite</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#nuevoUsuarioCheck').change(function () {
                if ($(this).is(':checked')) {
                    $('#nuevoUsuarioForm').show();
                    $('#tipoForm').hide();
                    $('#tipo').val(1); // Siempre préstamo para nuevos usuarios
                } else {
                    $('#nuevoUsuarioForm').hide();
                    $('#tipoForm').show();
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>