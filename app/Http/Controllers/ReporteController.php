<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Materia;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        $docentes = Docente::all();

        // Filtrar materias solo si se selecciona docente
        $materiasQuery = Materia::query();

        if ($request->filled('docente_id')) {
            $materiasQuery->whereHas('docentes', function ($q) use ($request) {
                $q->where('docente_id', $request->docente_id);
            });
        }

        $materias = $materiasQuery->get();

        $asistencias = collect();
        $fechas = collect();

        $docenteSeleccionado = null;
        $materiaSeleccionada = null;

        if (
            $request->filled('docente_id')
            && $request->filled('materia_id')
            && $request->filled('fecha_inicio')
            && $request->filled('fecha_fin')
        ) {
            $fechas = Asistencia::whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin])
                ->orderBy('fecha')
                ->pluck('fecha')
                ->unique()
                ->values();

            $materia = Materia::find($request->materia_id);
            $materiaSeleccionada = $materia;
            $docenteSeleccionado = Docente::find($request->docente_id);

            $estudiantes = Estudiante::where('carrera_id', $materia->carrera_id)->get();

            // Traer todas las asistencias de golpe
            $asistenciasTodas = Asistencia::whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin])
                ->whereIn('uid_nfc', $estudiantes->pluck('uid_nfc'))
                ->get()
                ->groupBy(['uid_nfc', 'fecha']);

            $filas = [];

            foreach ($estudiantes as $index => $estudiante) {
                $fila = [
                    'Nro' => $index + 1,
                    'Estudiante' => "{$estudiante->nombres} {$estudiante->apellido_paterno}",
                ];

                $total = 0;

                foreach ($fechas as $fecha) {
                    $asistencia = isset($asistenciasTodas[$estudiante->uid_nfc][$fecha])
                        ? $asistenciasTodas[$estudiante->uid_nfc][$fecha]->first()
                        : null;

                    if ($asistencia) {
                        $fila[$fecha] = 'P';
                        $total++;
                    } else {
                        $fila[$fecha] = 'F';
                    }
                }

                $fila['Asistencias'] = $total;
                $fila['Porcentaje'] = count($fechas) > 0
                    ? round(($total / count($fechas)) * 100).'%'
                    : '0%';

                $filas[] = $fila;
            }

            $asistencias = collect($filas);
        }

        return view('reportes.index', [
            'docentes' => $docentes,
            'materias' => $materias,
            'asistencias' => $asistencias,
            'fechas' => $fechas,
            'request' => $request,
            'docenteSeleccionado' => $docenteSeleccionado,
            'materiaSeleccionada' => $materiaSeleccionada,
        ]);
    }
}
