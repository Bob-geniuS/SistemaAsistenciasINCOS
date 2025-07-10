<div class="form-group">
    <label>Nombres</label>
    <input type="text" name="nombres" class="form-control" value="{{ old('nombres', $docente->nombres ?? '') }}">
</div>

<div class="form-group">
    <label>Apellido Paterno</label>
    <input type="text" name="apellido_paterno" class="form-control"
        value="{{ old('apellido_paterno', $docente->apellido_paterno ?? '') }}">
</div>

<div class="form-group">
    <label>Apellido Materno</label>
    <input type="text" name="apellido_materno" class="form-control"
        value="{{ old('apellido_materno', $docente->apellido_materno ?? '') }}">
</div>

<div class="form-group">
    <label>Documento</label>
    <input type="text" name="documento" class="form-control" value="{{ old('documento', $docente->documento ?? '') }}">
</div>

<div class="form-group">
    <label>UID NFC</label>
    <input type="text" name="uid_nfc" class="form-control" value="{{ old('uid_nfc', $docente->uid_nfc ?? '') }}">
</div>