<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="{{ public_path('assets/css/tailwind.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

    <title>{{ $title }}</title>
</head>

<body>
    <p class="h2">{{ $title }}</p>
    <div style="display: flex; align-items: center;">
        <p class="h4" style="margin-right: 2px;">Fecha y hora:</p>
        <p>{{ $date }}</p>
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ID Usuario</th>
                <th scope="col">Evento</th>
                <th scope="col">Tipo modificado</th>
                <th scope="col">ID Registro modificado</th>
                <th scope="col">Antes</th>
                <th scope="col">Después</th>
                <th scope="col">Hora</th>
                <th scope="col">IP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($audits as $audit)
                <tr>
                    <td scope="row">{{ $audit->id }}</td>
                    <td scope="row">{{ $audit->user_id }}</td>
                    <td scope="row">{{ $audit->event }}</td>
                    <td scope="row">{{ $audit->auditable_type }}</td>
                    <td scope="row">{{ $audit->auditable_id }}</td>
                    <td scope="row">
                        <pre>{{ json_encode($audit->old_values, JSON_PRETTY_PRINT) }}</pre>
                    </td>
                    <td scope="row">
                        <pre>{{ json_encode($audit->new_values, JSON_PRETTY_PRINT) }}</pre>
                    </td>
                    <td scope="row">{{ $audit->created_at }}</td>
                    <td scope="row">{{ $audit->ip_address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
