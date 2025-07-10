<div class="form-group">
    <label>Materia</label>
    <select name="materia_id" class="form-control">
        <option value="">Seleccione una materia</option>
        @foreach($materias as $materia)
            <option value="{{ $materia->id }}"
                {{ old('materia_id', $curso->materia_id ?? '') == $materia->id ? 'selected' : '' }}>
                {{ $materia->nombre_materia }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Carrera</label>
    <select name="carrera_id" class="form-control">
        <option value="">Seleccione una carrera</option>
        @foreach($carreras as $carrera)
            <option value="{{ $carrera->id }}"
                {{ old('carrera_id', $curso->carrera_id ?? '') == $carrera->id ? 'selected' : '' }}>
                {{ $carrera->nombre }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Gestión</label>
    <input type="text" name="gestion" class="form-control"
           value="{{ old('gestion', $curso->gestion ?? '') }}">
</div>
