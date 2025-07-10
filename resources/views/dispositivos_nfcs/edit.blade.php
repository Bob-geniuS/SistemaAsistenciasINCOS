@extends('adminlte::page')

@section('title', 'Editar Dispositivo NFC')

@section('content_header')
<h1>Editar Dispositivo NFC</h1>
@endsection

@section('content')
<form action="{{ route('dispositivos-nfcs.update', $dispositivosNfc) }}" method="POST">
    @csrf
    @method('PUT')

    @include('dispositivos_nfcs.form', ['dispositivosNfc' => $dispositivosNfc])

    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('dispositivos-nfcs.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection