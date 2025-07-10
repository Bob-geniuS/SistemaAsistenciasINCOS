@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
<h1>Lista de Docentes</h1>
@endsection

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('docentes.create') }}" class="btn btn-primary mb-3">
    Nuevo Docente
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Documento</th>
            <th>UID NFC</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($docentes as $docente)
        <tr>
            <td>{{ $docente->nombres }}</td>
            <td>{{ $docente->apellido_paterno }} {{ $docente->apellido_materno }}</td>
            <td>{{ $docente->documento }}</td>
            <td>{{ $docente->uid_nfc }}</td>
            <td>
                <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('docentes.destroy', $docente) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('¿Seguro?')" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $docentes->links() }}
@endsection