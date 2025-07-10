<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Curso;
use App\Models\Materia;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with(['carrera', 'materia'])->paginate(10);

        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $carreras = Carrera::all();
        $materias = Materia::all();

        return view('cursos.create', compact('carreras', 'materias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'materia_id' => 'required|exists:materias,id',
            'carrera_id' => 'required|exists:carreras,id',
            'gestion' => 'required|string|max:50',
        ]);

        Curso::create($validated);

        return redirect()->route('cursos.index')
            ->with('success', 'Curso registrado correctamente.');
    }

    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        $carreras = Carrera::all();
        $materias = Materia::all();

        return view('cursos.edit', compact('curso', 'carreras', 'materias'));
    }

    public function update(Request $request, Curso $curso)
    {
        $validated = $request->validate([
            'materia_id' => 'required|exists:materias,id',
            'carrera_id' => 'required|exists:carreras,id',
            'gestion' => 'required|string|max:50',
        ]);

        $curso->update($validated);

        return redirect()->route('cursos.index')
            ->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index')
            ->with('success', 'Curso eliminado correctamente.');
    }
}
