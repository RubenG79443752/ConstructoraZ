<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('Personal') !!}
                    {!! Form::select('personal_id', $personal, (isset($permiso->personal_id))? $permiso->personal_id:null, ['class' => 'form-select form-select-sm','id'=>'personal_id','required']) !!}
                    {!! $errors->first('personal_id', '<div class="text-danger">:message</div>') !!}

                </div>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('Justificativo') }}
                    <input type="file" class="form-control" id="justificativo" name="justificativo" accept="application/pdf"/>
                    {!! $errors->first('justificativo', '<div class="text-danger">:message</div>') !!}
                    @if ($accion == 'modificar')
                    <a href="{{ asset('storage/'.$permiso->justificativo) }}" class="text-decoration-none" target="_blank">Ver archivo de respaldo</a>
                    <div class="col-md-2 mt-2"><img src="{{ asset('storage/'.$permiso->justificativo) }}" alt="" width="120"></div>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('Tipo permiso') }}
                <select class="form-select" name="tipo_permiso" id="tipo_permiso">
                    <option value="Permiso por salud" @if(old('tipo_permiso', $permiso->tipo_permiso) === 'Permiso por salud')  selected @endif>Permiso por salud</option>
                    <option value="Permiso eventual" @if(old('tipo_permiso', $permiso->tipo_permiso) === 'Permiso eventual')  selected @endif>Permiso eventual</option>
                    <option value="Permiso prenatal" @if(old('tipo_permiso', $permiso->tipo_permiso) === 'Permiso prenatal')  selected @endif>Permiso prenatal</option>
                    <option value="Permiso posnatal" @if(old('tipo_permiso', $permiso->tipo_permiso) === 'Permiso posnatal')  selected @endif>Permiso posnatal</option>
                    <option value="Permiso por nacimiento" @if(old('tipo_permiso', $permiso->tipo_permiso) === 'Permiso por nacimiento')  selected @endif>Permiso por nacimiento</option>
                    <option value="Permiso por casamiento" @if(old('tipo_permiso', $permiso->tipo_permiso) === 'Permiso por casamiento')  selected @endif>Permiso por casamiento</option>
                    <option value="Permiso por fallecimiento" @if(old('tipo_permiso', $permiso->tipo_permiso) === 'Permiso por fallecimiento')  selected @endif>Permiso por fallecimiento</option>
                </select>
            </div>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('descripcion') }}
                {{ Form::text('descripcion', $permiso->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            </div>
            <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('desde') }}
                {{ Form::date('desde_fecha', $permiso->desde_fecha, ['class' => 'form-control' . ($errors->has('desde_fecha') ? ' is-invalid' : ''), 'placeholder' => 'Desde Fecha']) }}
                {!! $errors->first('desde_fecha', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            </div>
            <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('hasta') }}
                {{ Form::date('hasta_fecha', $permiso->hasta_fecha, ['class' => 'form-control' . ($errors->has('hasta_fecha') ? ' is-invalid' : ''), 'placeholder' => 'Hasta Fecha']) }}
                {!! $errors->first('hasta_fecha', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            </div>
            <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('horas') }}
                {{ Form::number('horas', $permiso->horas, ['class' => 'form-control' . ($errors->has('horas') ? ' is-invalid' : ''), 'placeholder' => 'Horas']) }}
                {!! $errors->first('horas', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();"> Guardar</button>
        <a href="{{ route('permisos.index') }}" class="btn btn-danger"> <i class="fa fa-users"></i> Listado</a>
    </div>
</div>
