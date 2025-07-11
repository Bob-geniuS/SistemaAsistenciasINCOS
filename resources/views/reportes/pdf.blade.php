<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Asistencias</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: #d3f9d8;
            /* Verde clarito */
        }
    </style>
</head>

<body>
    <h2>Reporte de Asistencias</h2>
    <p>Docente: {{ $docente?->nombres }} {{ $docente?->apellido_paterno }}</p>
    <p>Materia: {{ $materia?->nombre_materia }}</p>

    <table>
        <thead>
            <tr>
                <th>Nro</th>
                <th>Estudiante</th>
                @foreach($fechas as $fecha)
                <th>{{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}</th>
                @endforeach
                <th>Asistencias</th>
                <th>% Asistencia</th>
            </tr>
        </thead>
        <tbody>
            @foreach($asistencias as $fila)
            <tr>
                <td>{{ $fila['Nro'] }}</td>
                <td>{{ $fila['Estudiante'] }}</td>
                @foreach($fechas as $fecha)
                <td>{{ $fila[$fecha] }}</td>
                @endforeach
                <td>{{ $fila['Asistencias'] }}</td>
                <td>{{ $fila['Porcentaje'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>