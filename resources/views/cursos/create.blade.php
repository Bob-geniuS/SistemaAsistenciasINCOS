@extends('adminlte::page')

@section('title', 'Nuevo Curso')

@section('content_header')
<h1>Nuevo Curso</h1>
@endsection

@section('content')
<form action="{{ route('cursos.store') }}" method="POST">
    @csrf

    @include('cursos.form')

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection