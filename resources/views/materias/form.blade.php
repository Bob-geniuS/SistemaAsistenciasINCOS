<div class="form-group">
    <label>Nombre de la materia</label>
    <input type="text" name="nombre_materia" class="form-control"
        value="{{ old('nombre_materia', $materia->nombre_materia ?? '') }}">
</div>

<div class="form-group">
    <label>Código</label>
    <input type="text" name="codigo" class="form-control" value="{{ old('codigo', $materia->codigo ?? '') }}">
</div>

<div class="form-group">
    <label>Descripción</label>
    <textarea name="descripcion" class="form-control">{{ old('descripcion', $materia->descripcion ?? '') }}</textarea>
</div>