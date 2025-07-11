<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReporteExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data['asistencias'];
    }

    public function headings(): array
    {
        $fechas = $this->data['fechas']->map(fn ($fecha) => \Carbon\Carbon::parse($fecha)->format('d/m/Y'));

        return array_merge(
            ['Nro', 'Estudiante'],
            $fechas->toArray(),
            ['Asistencias', '% Asistencia']
        );
    }
}
