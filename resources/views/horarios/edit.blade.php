@extends('adminlte::page')

@section('title', 'Editar Horario')

@section('content_header')
<h1>Editar Horario</h1>
@endsection

@section('content')
<form action="{{ route('horarios.update', $horario) }}" method="POST">
    @csrf
    @method('PUT')

    @include('horarios.form', ['horario' => $horario])

    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection