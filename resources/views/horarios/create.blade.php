@extends('adminlte::page')

@section('title', 'Nuevo Horario')

@section('content_header')
<h1>Nuevo Horario</h1>
@endsection

@section('content')
<form action="{{ route('horarios.store') }}" method="POST">
    @csrf

    @include('horarios.form')

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection