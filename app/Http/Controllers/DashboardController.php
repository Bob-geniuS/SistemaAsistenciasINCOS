<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Asistencia::query();

        if ($request->filled('fecha_inicio')) {
            $query->where('fecha', '>=', $request->fecha_inicio);
        }

        if ($request->filled('fecha_fin')) {
            $query->where('fecha', '<=', $request->fecha_fin);
        } else {
            // Si no envían fechas, mostrar solo hoy
            $query->where('fecha', \Carbon\Carbon::today());
        }

        $totalEstudiantes = (clone $query)->where('tipo', 'ESTUDIANTE')->count();
        $totalDocentes = (clone $query)->where('tipo', 'DOCENTE')->count();
        $totalAdministrativos = (clone $query)->where('tipo', 'ADMINISTRATIVO')->count();

        $totalHoy = $totalEstudiantes + $totalDocentes + $totalAdministrativos;

        $ultimas = (clone $query)
            ->with('aula')
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
