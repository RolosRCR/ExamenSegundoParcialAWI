<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Sistema de bibliotecas</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    @if(session('rol') == 1)
                        <!-- Solo admin tiene acceso usuario -->
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Usuarios <span class="sr-only">(current)</span></a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link disabled" href="usuarios.index">Usuarios</a>
                        </li>
                    @endif



                    <!-- todos tienen acceso estos -->

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('libros.index') }}">Libros</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tramites.index') }}">Tramites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/top') }}">Top</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>