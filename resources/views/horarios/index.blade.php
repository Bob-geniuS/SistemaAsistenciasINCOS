@extends('adminlte::page')

@section('title', 'Horarios')

@section('content_header')
<h1>Lista de Horarios</h1>
@endsection

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('horarios.create') }}" class="btn btn-primary mb-3">
    Nuevo Horario
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Curso</th>
            <th>Aula</th>
            <th>Día</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($horarios as $horario)
        <tr>
            <td>{{ $horario->curso->materia->nombre_materia ?? '' }} - {{ $horario->curso->gestion }}</td>
            <td>{{ $horario->aula->nombre ?? '' }}</td>
            <td>{{ $horario->dia }}</td>
            <td>{{ $horario->hora_inicio }}</td>
            <td>{{ $horario->hora_fin }}</td>
            <td>
                <a href="{{ route('horarios.edit', $horario) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('horarios.destroy', $horario) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('¿Seguro?')" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $horarios->links() }}
@endsection