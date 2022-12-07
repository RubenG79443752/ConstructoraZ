<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('cargo') }}
            {{ Form::text('cargo', $cargo->cargo, ['class' => 'form-control' . ($errors->has('cargo') ? ' is-invalid' : ''), 'placeholder' => 'Cargo']) }}
            {!! $errors->first('cargo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();"> Guardar</button>
        <a href="{{ route('cargos.index') }}" class="btn btn-danger"> <i class="fa fa-users"></i> Listado</a>
    </div>
</div>
