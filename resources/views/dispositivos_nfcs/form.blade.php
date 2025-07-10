<div class="form-group">
    <label>UID del Dispositivo</label>
    <input type="text" name="uid_dispositivo" class="form-control"
           value="{{ old('uid_dispositivo', $dispositivosNfc->uid_dispositivo ?? '') }}">
</div>

<div class="form-group">
    <label>Descripción</label>
    <textarea name="descripcion" class="form-control">{{ old('descripcion', $dispositivosNfc->descripcion ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>Aula</label>
    <select name="aula_id" class="form-control">
        <option value="">Seleccione un aula</option>
        @foreach($aulas as $aula)
            <option value="{{ $aula->id }}"
                {{ old('aula_id', $dispositivosNfc->aula_id ?? '') == $aula->id ? 'selected' : '' }}>
                {{ $aula->nombre }}
            </option>
        @endforeach
    </select>
</div>
