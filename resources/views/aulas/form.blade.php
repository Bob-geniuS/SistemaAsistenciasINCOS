<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $aula->nombre ?? '') }}">
</div>

<div class="form-group">
    <label>Descripción</label>
    <textarea name="descripcion" class="form-control">{{ old('descripcion', $aula->descripcion ?? '') }}</textarea>
</div>