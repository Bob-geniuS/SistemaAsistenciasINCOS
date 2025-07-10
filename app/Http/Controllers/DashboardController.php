<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $hoy = Carbon::today();

        // Totales por tipo
        $totalEstudiantes = Asistencia::where('tipo', 'ESTUDIANTE')->whereDate('fecha', $hoy)->count();
        $totalDocentes = Asistencia::where('tipo', 'DOCENTE')->whereDate('fecha', $hoy)->count();
        $totalAdministrativos = Asistencia::where('tipo', 'ADMINISTRATIVO')->whereDate('fecha', $hoy)->count();

        // Total general
        $totalHoy = $totalEstudiantes + $totalDocentes + $totalAdministrativos;

        // Últimas asistencias
        $ultimas = Asistencia::with('aula')
            ->orderByDesc('fecha')
            ->orderByDesc('hora')
            ->limit(10)
            ->get();

        return view('dashboard.index', compact(
            'totalEstudiantes',
            'totalDocentes',
            'totalAdministrativos',
            'totalHoy',
            'ultimas'
        ));
    }
}
