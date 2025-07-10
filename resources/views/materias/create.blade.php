@extends('adminlte::page')

@section('title', 'Nueva Materia')

@section('content_header')
<h1>Nueva Materia</h1>
@endsection

@section('content')
<form action="{{ route('materias.store') }}" method="POST">
    @csrf

    @include('materias.form')

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('materias.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection