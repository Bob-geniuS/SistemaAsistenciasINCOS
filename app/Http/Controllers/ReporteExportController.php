<?php

namespace App\Http\Controllers;

use App\Exports\ReporteExport;
use App\Models\Asistencia;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Materia;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ReporteExportController extends Controller
{
    public function exportExcel(Request $request)
    {
        $data = $this->buildData($request);

        return Excel::download(new ReporteExport($data), 'reporte_asistencias.xlsx');
    }

    public function exportPDF(Request $request)
    {
        $data = $this->buildData($request);

        $pdf = PDF::loadView('reportes.pdf', $data);

        return $pdf->download('reporte_asistencias.pdf');
    }

    private function buildData(Request $request)
    {
        $docenteSeleccionado = Docente::find($request->docente_id);
        $materiaSeleccionada = Materia::find($request->materia_id);

        $fechas = Asistencia::whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin])
            ->orderBy('fecha')
            ->pluck('fecha')
            ->unique()
            ->values();

        $estudiantes = collect();

        if ($materiaSeleccionado = Materia::find($request->materia_id)) {
            $estudiantes = Estudiante::where('carrera_id', $materiaSeleccionado->carrera_id)->get();
        }

        // Traer asistencias agrupadas
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

        return [
            'docente' => $docenteSeleccionado,
            'materia' => $materiaSeleccionada,
            'asistencias' => collect($filas),
            'fechas' => $fechas,
        ];
    }
}
