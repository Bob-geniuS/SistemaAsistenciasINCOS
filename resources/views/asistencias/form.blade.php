<div class="form-group">
    <label>UID NFC</label>
    <input type="text" name="uid_nfc" class="form-control" value="{{ old('uid_nfc', $asistencia->uid_nfc ?? '') }}">
</div>

<div class="form-group">
    <label>Tipo</label>
    <select name="tipo" class="form-control">
        <option value="">Seleccione un tipo</option>
        @foreach($tipos as $tipo)
        <option value="{{ $tipo }}" {{ old('tipo', $asistencia->tipo ?? '') == $tipo ? 'selected' : '' }}>
            {{ $tipo }}
        </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Aula</label>
    <select name="aula_id" class="form-control">
        <option value="">Seleccione un aula</option>
        @foreach($aulas as $aula)
        <option value="{{ $aula->id }}" {{ old('aula_id', $asistencia->aula_id ?? '') == $aula->id ? 'selected' : '' }}>
            {{ $aula->nombre }}
        </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Fecha y Hora</label>
    <input type="datetime-local" name="fecha_hora" class="form-control"
        value="{{ old('fecha_hora', isset($asistencia->fecha_hora) ? date('Y-m-d\TH:i', strtotime($asistencia->fecha_hora)) : '') }}">
</div>