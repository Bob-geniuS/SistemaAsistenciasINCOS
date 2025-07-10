<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Administrativo;
use App\Models\Asistencia;
use App\Models\DispositivosNfc;
use App\Models\Docente;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class NfcApiController extends Controller
{
    public function registrar(Request $request)
    {
        $validated = $request->validate([
            'uid_nfc' => 'required|string',
            'dispositivo_uid' => 'required|string',
        ]);

        // Buscamos el dispositivo
        $dispositivo = DispositivosNfc::where('uid_dispositivo', $validated['dispositivo_uid'])->first();

        if (! $dispositivo) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dispositivo NFC no registrado.',
            ], 404);
        }

        $tipo = null;

        // Buscamos al estudiante
        $estudiante = Estudiante::where('uid_nfc', $validated['uid_nfc'])->first();
        if ($estudiante) {
            $tipo = 'ESTUDIANTE';
        }

        // Buscamos al docente
        $docente = Docente::where('uid_nfc', $validated['uid_nfc'])->first();
        if ($docente) {
            $tipo = 'DOCENTE';
        }

        // Buscamos al personal administrativo
        $admin = Administrativo::where('uid_nfc', $validated['uid_nfc'])->first();
        if ($admin) {
            $tipo = 'ADMINISTRATIVO';
        }

        if (! $tipo) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tarjeta no registrada.',
            ], 404);
        }

        // Registrar asistencia
        $ahora = now();

        Asistencia::create([
            'uid_nfc' => $validated['uid_nfc'],
            'tipo' => $tipo,
            'aula_id' => $dispositivo->aula_id,
            'fecha' => $ahora->toDateString(),      // Ej. 2025-07-09
            'hora' => $ahora->toTimeString(),       // Ej. 17:53:15
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Asistencia registrada correctamente.',
            'tipo' => $tipo,
            'aula' => $dispositivo->aula->nombre,
            'fecha_hora' => now()->toDateTimeString(),
        ]);
    }
}
