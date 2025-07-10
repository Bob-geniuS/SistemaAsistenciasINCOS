<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Asistencia::query();

        if ($request->filled('rango')) {
            switch ($request->rango) {
                case 'hoy':
                    $query->whereDate('fecha', \Carbon\Carbon::today());
                    break;

                case '7dias':
                    $query->whereBetween('fecha', [
                        \Carbon\Carbon::today()->subDays(6),
                        \Carbon\Carbon::today(),
                    ]);
                    break;

                case 'mes':
                    $query->whereMonth('fecha', \Carbon\Carbon::today()->month)
                        ->whereYear('fecha', \Carbon\Carbon::today()->year);
                    break;
            }
        } else {
            // Si no se envía rango, revisa si se enviaron fechas manuales
            if ($request->filled('fecha_inicio')) {
                $query->where('fecha', '>=', $request->fecha_inicio);
            }

            if ($request->filled('fecha_fin')) {
                $query->where('fecha', '<=', $request->fecha_fin);
            } else {
                // Si no hay nada, mostrar solo hoy
                $query->whereDate('fecha', \Carbon\Carbon::today());
            }
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
