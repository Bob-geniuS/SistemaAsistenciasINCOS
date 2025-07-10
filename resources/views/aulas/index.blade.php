@extends('adminlte::page')

@section('title', 'Aulas')

@section('content_header')
<h1>Lista de Aulas</h1>
@endsection

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('aulas.create') }}" class="btn btn-primary mb-3">
    Nueva Aula
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($aulas as $aula)
        <tr>
            <td>{{ $aula->nombre }}</td>
            <td>{{ $aula->descripcion }}</td>
            <td>
                <a href="{{ route('aulas.edit', $aula) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('aulas.destroy', $aula) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('¿Seguro?')" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $aulas->links() }}
@endsection