

@section('content')
<div class="container">
    <h1>Lista de Beneficiarios</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID Beneficiario</th>
                <th>Nombre</th>
                <th>Número de Préstamos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($beneficiarios as $beneficiario)
            <tr>
                <td>{{ $beneficiario->id_beneficiario }}</td>
                <td>{{ $beneficiario->nombre }}</td>
                <td>{{ $beneficiario->numero_de_prestamos }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
