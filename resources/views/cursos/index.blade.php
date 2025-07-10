@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')
<h1>Lista de Cursos</h1>
@endsection

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">
    Nuevo Curso
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Materia</th>
            <th>Carrera</th>
            <th>Gestión</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cursos as $curso)
        <tr>
            <td>{{ $curso->materia->nombre_materia ?? '' }}</td>
            <td>{{ $curso->carrera->nombre ?? '' }}</td>
            <td>{{ $curso->gestion }}</td>
            <td>
                <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('cursos.destroy', $curso) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('¿Seguro?')" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $cursos->links() }}
@endsection