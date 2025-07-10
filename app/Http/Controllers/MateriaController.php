<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::paginate(10);

        return view('materias.index', compact('materias'));
    }

    public function create()
    {
        return view('materias.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_materia' => 'required|string|max:255',
            'codigo' => 'nullable|string|max:50',
            'descripcion' => 'nullable|string',
        ]);

        Materia::create($validated);

        return redirect()->route('materias.index')->with('success', 'Materia registrada correctamente.');
    }

    public function show(Materia $materia)
    {
        return view('materias.show', compact('materia'));
    }

    public function edit(Materia $materia)
    {
        return view('materias.edit', compact('materia'));
    }

    public function update(Request $request, Materia $materia)
    {
        $validated = $request->validate([
            'nombre_materia' => 'required|string|max:255',
            'codigo' => 'nullable|string|max:50',
            'descripcion' => 'nullable|string',
        ]);

        $materia->update($validated);

        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente.');
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();

        return redirect()->route('materias.index')->with('success', 'Materia eliminada correctamente.');
    }
}
