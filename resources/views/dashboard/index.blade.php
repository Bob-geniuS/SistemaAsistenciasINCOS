@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Resumen Diario</h1>
@stop

@section('content')
<div class="row">

    <div class="col-md-3">
        <x-adminlte-info-box title="Total Hoy" text="{{ $totalHoy }}" icon="fas fa-users" theme="primary" />
    </div>

    <div class="col-md-3">
        <x-adminlte-info-box title="Estudiantes" text="{{ $totalEstudiantes }}" icon="fas fa-user-graduate"
            theme="success" />
    </div>

    <div class="col-md-3">
        <x-adminlte-info-box title="Docentes" text="{{ $totalDocentes }}" icon="fas fa-chalkboard-teacher"
            theme="warning" />
    </div>

    <div class="col-md-3">
        <x-adminlte-info-box title="Administrativos" text="{{ $totalAdministrativos }}" icon="fas fa-user-tie"
            theme="danger" />
    </div>

</div>

<div class="row mt-4">
    <div class="col-md-6">
        <canvas id="asistenciasChart"></canvas>
    </div>

    <div class="col-md-6">
        <h5>Últimas Asistencias</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Tipo</th>
                    <th>Aula</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ultimas as $a)
                <tr>
                    <td>{{ $a->nombre_persona }}</td>
                    <td>{{ $a->tipo }}</td>
                    <td>{{ $a->aula->nombre ?? '' }}</td>
                    <td>{{ $a->fecha }} {{ $a->hora }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('asistenciasChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Estudiantes', 'Docentes', 'Administrativos'],
            datasets: [{
                label: 'Asistencias Hoy',
                data: [{{ $totalEstudiantes }}, {{ $totalDocentes }}, {{ $totalAdministrativos }}],
                backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@stop