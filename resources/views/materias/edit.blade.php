@extends('adminlte::page')

@section('title', 'Editar Materia')

@section('content_header')
<h1>Editar Materia</h1>
@endsection

@section('content')
<form action="{{ route('materias.update', $materia) }}" method="POST">
    @csrf
    @method('PUT')

    @include('materias.form', ['materia' => $materia])

    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('materias.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection