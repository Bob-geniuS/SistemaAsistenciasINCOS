<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Aula;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function index()
    {
        $asistencias = Asistencia::with('aula')->orderByDesc('fecha')->paginate(15);

        return view('asistencias.index', compact('asistencias'));
    }

    public function create()
    {
        $aulas = Aula::all();
        $tipos = ['ESTUDIANTE', 'DOCENTE', 'ADMINISTRATIVO'];

        return view('asistencias.create', compact('aulas', 'tipos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'uid_nfc' => 'required|string',
            'tipo' => 'required|in:ESTUDIANTE,DOCENTE,ADMINISTRATIVO',
            'aula_id' => 'required|exists:aulas,id',
            'fecha_hora' => 'required|date',
        ]);

        Asistencia::create($validated);

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia registrada correctamente.');
    }

    public function show(Asistencia $asistencia)
    {
        return view('asistencias.show', compact('asistencia'));
    }

    public function edit(Asistencia $asistencia)
    {
        $aulas = Aula::all();
        $tipos = ['ESTUDIANTE', 'DOCENTE', 'ADMINISTRATIVO'];

        return view('asistencias.edit', compact('asistencia', 'aulas', 'tipos'));
    }

    public function update(Request $request, Asistencia $asistencia)
    {
        $validated = $request->validate([
            'uid_nfc' => 'required|string',
            'tipo' => 'required|in:ESTUDIANTE,DOCENTE,ADMINISTRATIVO',
            'aula_id' => 'required|exists:aulas,id',
            'fecha_hora' => 'required|date',
        ]);

        $asistencia->update($validated);

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia actualizada correctamente.');
    }

    public function destroy(Asistencia $asistencia)
    {
        $asistencia->delete();

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia eliminada correctamente.');
    }
}
