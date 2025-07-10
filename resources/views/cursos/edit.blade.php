@extends('adminlte::page')

@section('title', 'Editar Curso')

@section('content_header')
<h1>Editar Curso</h1>
@endsection

@section('content')
<form action="{{ route('cursos.update', $curso) }}" method="POST">
    @csrf
    @method('PUT')

    @include('cursos.form', ['curso' => $curso])

    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection