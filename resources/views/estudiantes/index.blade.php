@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Lista de Estudiantes</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary mb-3">
        Nuevo Estudiante
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>C.I.</th>
                <th>UID NFC</th>
                <th>Carrera</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
            <tr>
                <td>{{ $estudiante->nombres }}</td>
                <td>{{ $estudiante->apellido_paterno }} {{ $estudiante->apellido_materno }}</td>
                <td>{{ $estudiante->cedula_identidad }}</td>
                <td>{{ $estudiante->uid_nfc }}</td>
                <td>{{ $estudiante->carrera->nombre ?? '' }}</td>
                <td>
                    <a href="{{ route('estudiantes.edit', $estudiante) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('¿Seguro?')" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $estudiantes->links() }}
</div>
@endsection