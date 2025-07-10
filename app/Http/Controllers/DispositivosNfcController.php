<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\DispositivosNfc;
use Illuminate\Http\Request;

class DispositivosNfcController extends Controller
{
    public function index()
    {
        $dispositivos = DispositivosNfc::with('aula')->paginate(10);

        return view('dispositivos_nfcs.index', compact('dispositivos'));
    }

    public function create()
    {
        $aulas = Aula::all();

        return view('dispositivos_nfcs.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'uid_dispositivo' => 'required|string|unique:dispositivos_nfcs,uid_dispositivo',
            'descripcion' => 'nullable|string|max:255',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        DispositivosNfc::create($validated);

        return redirect()->route('dispositivos-nfcs.index')
            ->with('success', 'Dispositivo NFC registrado correctamente.');
    }

    public function show(DispositivosNfc $dispositivosNfc)
    {
        return view('dispositivos_nfcs.show', compact('dispositivosNfc'));
    }

    public function edit(DispositivosNfc $dispositivosNfc)
    {
        $aulas = Aula::all();

        return view('dispositivos_nfcs.edit', compact('dispositivosNfc', 'aulas'));
    }

    public function update(Request $request, DispositivosNfc $dispositivosNfc)
    {
        $validated = $request->validate([
            'uid_dispositivo' => 'required|string|unique:dispositivos_nfcs,uid_dispositivo,'.$dispositivosNfc->id,
            'descripcion' => 'nullable|string|max:255',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        $dispositivosNfc->update($validated);

        return redirect()->route('dispositivos-nfcs.index')
            ->with('success', 'Dispositivo NFC actualizado correctamente.');
    }

    public function destroy(DispositivosNfc $dispositivosNfc)
    {
        $dispositivosNfc->delete();

        return redirect()->route('dispositivos-nfcs.index')
            ->with('success', 'Dispositivo NFC eliminado correctamente.');
    }
}
