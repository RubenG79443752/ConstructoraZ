<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre rol') }}
            {{ Form::text('nombre_rol', $rol->nombre_rol, ['class' => 'form-control' . ($errors->has('nombre_rol') ? ' is-invalid' : ''), 'placeholder' => '...']) }}
            {!! $errors->first('nombre_rol', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();"> Guardar</button>
        <a href="{{ route('rols.index') }}" class="btn btn-danger"> <i class="fa fa-users"></i> Listado</a>
    </div>
</div>
