@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
<h1>Generar Reporte de Asistencias</h1>
@stop

@section('content')

<form method="GET" action="{{ route('reportes.index') }}" class="mb-4">
    <div class="row">
        <div class="col-md-3">
            <label>Docente</label>
            <select name="docente_id" class="form-control">
                <option value="">-- Seleccione --</option>
                @foreach($docentes as $docente)
                <option value="{{ $docente->id }}" {{ $request->docente_id == $docente->id ? 'selected' : '' }}>
                    {{ $docente->nombres }} {{ $docente->apellido_paterno }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label>Materia</label>
            <select name="materia_id" class="form-control">
                <option value="">-- Seleccione --</option>
                @foreach($materias as $materia)
                <option value="{{ $materia->id }}" {{ $request->materia_id == $materia->id ? 'selected' : '' }}>
                    {{ $materia->nombre_materia }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label>Desde</label>
            <input type="date" name="fecha_inicio" class="form-control" value="{{ $request->fecha_inicio }}">
        </div>

        <div class="col-md-3">
            <label>Hasta</label>
            <input type="date" name="fecha_fin" class="form-control" value="{{ $request->fecha_fin }}">
        </div>
    </div>

    <div class="mt-3">
        <button class="btn btn-primary">Buscar</button>
    </div>
</form>

@if($asistencias->count())
<h4>Resultados:</h4>

<p>Docente: <strong>{{ $docenteSeleccionado?->nombres }}</strong></p>
<p>Materia: <strong>{{ $materiaSeleccionada?->nombre_materia }}</strong></p>

<table class="table table-bordered text-center">
    <thead class="bg-success text-white">
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

<div class="mt-3">
    <a href="{{ route('reportes.excel', request()->query()) }}" class="btn btn-success">Exportar Excel</a>
    <a href="{{ route('reportes.pdf', request()->query()) }}" class="btn btn-danger">Exportar PDF</a>
</div>

@elseif($request->has('docente_id'))
<p>No se encontraron asistencias para los criterios seleccionados.</p>
@endif

@stop