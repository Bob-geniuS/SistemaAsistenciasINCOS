@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Editar Estudiante</h1>

    <form action="{{ route('estudiantes.update', $estudiante) }}" method="POST">
        @csrf
        @method('PUT')

        @include('estudiantes.form', ['estudiante' => $estudiante])

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
