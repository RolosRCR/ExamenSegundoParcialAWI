<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Top Usuarios y Libros</title>
</head>
<body>
    @include('navbar')
    <div class="container">
        <h1>Top Usuarios de la Biblioteca</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Beneficiario</th>
                    <th>Veces Rentado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topBeneficiarios as $index => $beneficiario)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $beneficiario->nombre }}</td>
                    <td>{{ $beneficiario->servicio }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container mt-4">
        <h1>Top Libros de la Biblioteca</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Libro</th>
                    <th>Veces Rentado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topLibros as $index => $libro)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $libro->nombre }}</td>
                    <td>{{ $libro->contador }}</td>
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
