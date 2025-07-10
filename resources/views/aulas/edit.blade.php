@extends('adminlte::page')

@section('title', 'Editar Aula')

@section('content_header')
<h1>Editar Aula</h1>
@endsection

@section('content')
<form action="{{ route('aulas.update', $aula) }}" method="POST">
    @csrf
    @method('PUT')

    @include('aulas.form', ['aula' => $aula])

    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection