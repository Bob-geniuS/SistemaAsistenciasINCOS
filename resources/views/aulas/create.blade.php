@extends('adminlte::page')

@section('title', 'Nueva Aula')

@section('content_header')
<h1>Nueva Aula</h1>
@endsection

@section('content')
<form action="{{ route('aulas.store') }}" method="POST">
    @csrf

    @include('aulas.form')

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection