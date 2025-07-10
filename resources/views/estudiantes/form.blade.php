<div class="form-group">
    <label>Nombres</label>
    <input type="text" name="nombres" class="form-control" value="{{ old('nombres', $estudiante->nombres ?? '') }}">
</div>

<div class="form-group">
    <label>Apellido Paterno</label>
    <input type="text" name="apellido_paterno" class="form-control"
        value="{{ old('apellido_paterno', $estudiante->apellido_paterno ?? '') }}">
</div>

<div class="form-group">
    <label>Apellido Materno</label>
    <input type="text" name="apellido_materno" class="form-control"
        value="{{ old('apellido_materno', $estudiante->apellido_materno ?? '') }}">
</div>

<div class="form-group">
    <label>Cédula de Identidad</label>
    <input type="text" name="cedula_identidad" class="form-control"
        value="{{ old('cedula_identidad', $estudiante->cedula_identidad ?? '') }}">
</div>

<div class="form-group">
    <label>UID NFC</label>
    <input type="text" name="uid_nfc" class="form-control" value="{{ old('uid_nfc', $estudiante->uid_nfc ?? '') }}">
</div>

<div class="form-group">
    <label>Carrera</label>
    <select name="carrera_id" class="form-control">
        <option value="">Seleccione una carrera</option>
        @foreach($carreras as $carrera)
        <option value="{{ $carrera->id }}" {{ old('carrera_id', $estudiante->carrera_id ?? '') == $carrera->id ?
            'selected' : '' }}>
            {{ $carrera->nombre }}
        </option>
        @endforeach
    </select>
</div>