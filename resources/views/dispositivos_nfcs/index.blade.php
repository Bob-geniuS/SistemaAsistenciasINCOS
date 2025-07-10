@extends('adminlte::page')

@section('title', 'Dispositivos NFC')

@section('content_header')
<h1>Lista de Dispositivos NFC</h1>
@endsection

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('dispositivos-nfcs.create') }}" class="btn btn-primary mb-3">
    Nuevo Dispositivo NFC
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>UID Dispositivo</th>
            <th>Descripción</th>
            <th>Aula</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dispositivos as $dispositivo)
        <tr>
            <td>{{ $dispositivo->uid_dispositivo }}</td>
            <td>{{ $dispositivo->descripcion }}</td>
            <td>{{ $dispositivo->aula->nombre ?? '' }}</td>
            <td>
                <a href="{{ route('dispositivos-nfcs.edit', $dispositivo) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('dispositivos-nfcs.destroy', $dispositivo) }}" method="POST"
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

{{ $dispositivos->links() }}
@endsection