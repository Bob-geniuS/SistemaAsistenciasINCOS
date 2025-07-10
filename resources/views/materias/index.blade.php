@extends('adminlte::page')

@section('title', 'Materias')

@section('content_header')
<h1>Lista de Materias</h1>
@endsection

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('materias.create') }}" class="btn btn-primary mb-3">
    Nueva Materia
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Código</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($materias as $materia)
        <tr>
            <td>{{ $materia->nombre_materia }}</td>
            <td>{{ $materia->codigo }}</td>
            <td>{{ $materia->descripcion }}</td>
            <td>
                <a href="{{ route('materias.edit', $materia) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('materias.destroy', $materia) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('¿Seguro?')" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $materias->links() }}
@endsection