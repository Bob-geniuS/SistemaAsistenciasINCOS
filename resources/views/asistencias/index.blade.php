@extends('adminlte::page')

@section('title', 'Asistencias')

@section('content_header')
<h1>Registro de Asistencias</h1>
@endsection

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('asistencias.create') }}" class="btn btn-primary mb-3">
    Nueva Asistencia
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>UID NFC</th>
            <th>Tipo</th>
            <th>Aula</th>
            <th>Fecha y Hora</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($asistencias as $asistencia)
        <tr>
            <td>{{ $asistencia->uid_nfc }}</td>
            <td>{{ $asistencia->tipo }}</td>
            <td>{{ $asistencia->aula->nombre ?? '' }}</td>
            <td>{{ $asistencia->fecha_hora }}</td>
            <td>
                <a href="{{ route('asistencias.edit', $asistencia) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('asistencias.destroy', $asistencia) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('¿Seguro?')" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $asistencias->links() }}
@endsection