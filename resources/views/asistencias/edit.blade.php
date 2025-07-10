@extends('adminlte::page')

@section('title', 'Editar Asistencia')

@section('content_header')
<h1>Editar Asistencia</h1>
@endsection

@section('content')
<form action="{{ route('asistencias.update', $asistencia) }}" method="POST">
    @csrf
    @method('PUT')

    @include('asistencias.form', ['asistencia' => $asistencia])

    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection