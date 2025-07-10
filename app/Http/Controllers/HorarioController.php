<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Curso;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::with(['curso', 'aula'])->paginate(10);

        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        $cursos = Curso::all();
        $aulas = Aula::all();
        $dias = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];

        return view('horarios.create', compact('cursos', 'aulas', 'dias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'aula_id' => 'required|exists:aulas,id',
            'dia' => 'required|in:Lunes,Martes,Miercoles,Jueves,Viernes,Sabado,Domingo',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        Horario::create($validated);

        return redirect()->route('horarios.index')
            ->with('success', 'Horario registrado correctamente.');
    }

    public function show(Horario $horario)
    {
        return view('horarios.show', compact('horario'));
    }

    public function edit(Horario $horario)
    {
        $cursos = Curso::all();
        $aulas = Aula::all();
        $dias = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];

        return view('horarios.edit', compact('horario', 'cursos', 'aulas', 'dias'));
    }

    public function update(Request $request, Horario $horario)
    {
        $validated = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'aula_id' => 'required|exists:aulas,id',
            'dia' => 'required|in:Lunes,Martes,Miercoles,Jueves,Viernes,Sabado,Domingo',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        $horario->update($validated);

        return redirect()->route('horarios.index')
            ->with('success', 'Horario actualizado correctamente.');
    }

    public function destroy(Horario $horario)
    {
        $horario->delete();

        return redirect()->route('horarios.index')
            ->with('success', 'Horario eliminado correctamente.');
    }
}
