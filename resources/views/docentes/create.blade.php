@extends('adminlte::page')

@section('title', 'Nuevo Docente')

@section('content_header')
<h1>Nuevo Docente</h1>
@endsection

@section('content')
<form action="{{ route('docentes.store') }}" method="POST">
    @csrf

    @include('docentes.form')

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection