@extends('adminlte::page')

@section('title', 'Nuevo Dispositivo NFC')

@section('content_header')
<h1>Nuevo Dispositivo NFC</h1>
@endsection

@section('content')
<form action="{{ route('dispositivos-nfcs.store') }}" method="POST">
    @csrf

    @include('dispositivos_nfcs.form')

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('dispositivos-nfcs.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection