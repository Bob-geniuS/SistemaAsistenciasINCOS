@extends('adminlte::page')

@section('title', 'Editar Docente')

@section('content_header')
<h1>Editar Docente</h1>
@endsection

@section('content')
<form action="{{ route('docentes.update', $docente) }}" method="POST">
    @csrf
    @method('PUT')

    @include('docentes.form', ['docente' => $docente])

    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection