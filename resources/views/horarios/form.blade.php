<div class="form-group">
    <label>Curso</label>
    <select name="curso_id" class="form-control">
        <option value="">Seleccione un curso</option>
        @foreach($cursos as $curso)
        <option value="{{ $curso->id }}" {{ old('curso_id', $horario->curso_id ?? '') == $curso->id ? 'selected' : ''
            }}>
            {{ $curso->materia->nombre_materia ?? '' }} - {{ $curso->gestion }}
        </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Aula</label>
    <select name="aula_id" class="form-control">
        <option value="">Seleccione un aula</option>
        @foreach($aulas as $aula)
        <option value="{{ $aula->id }}" {{ old('aula_id', $horario->aula_id ?? '') == $aula->id ? 'selected' : '' }}>
            {{ $aula->nombre }}
        </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Día</label>
    <select name="dia" class="form-control">
        <option value="">Seleccione un día</option>
        @foreach($dias as $dia)
        <option value="{{ $dia }}" {{ old('dia', $horario->dia ?? '') == $dia ? 'selected' : '' }}>
            {{ $dia }}
        </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Hora Inicio</label>
    <input type="time" name="hora_inicio" class="form-control"
        value="{{ old('hora_inicio', $horario->hora_inicio ?? '') }}">
</div>

<div class="form-group">
    <label>Hora Fin</label>
    <input type="time" name="hora_fin" class="form-control" value="{{ old('hora_fin', $horario->hora_fin ?? '') }}">
</div>