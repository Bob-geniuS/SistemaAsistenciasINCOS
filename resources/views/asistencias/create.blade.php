@extends('adminlte::page')

@section('title', 'Nueva Asistencia')

@section('content_header')
<h1>Nueva Asistencia</h1>
@endsection

@section('content')
<form action="{{ route('asistencias.store') }}" method="POST">
    @csrf

    @include('asistencias.form')

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection