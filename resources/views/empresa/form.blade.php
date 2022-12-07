<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Reemplazar logo') }}
            <input type="file" class="form-control" id="logo" name="logo" accept="image/jpeg"/>
            {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!}
            <div class="col-md-2 mt-2"><img src="{{ asset('storage/'.$empresa->logo) }}" alt="" width="120"></div>
        </div>
        <div class="form-group">
            {{ Form::label('razon_social') }}
            {{ Form::text('razon_social', $empresa->razon_social, ['class' => 'form-control' . ($errors->has('razon_social') ? ' is-invalid' : ''), 'placeholder' => 'Razon Social']) }}
            {!! $errors->first('razon_social', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('n_nit') }}
            {{ Form::text('n_nit', $empresa->n_nit, ['class' => 'form-control' . ($errors->has('n_nit') ? ' is-invalid' : ''), 'placeholder' => 'N Nit']) }}
            {!! $errors->first('n_nit', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('n_identificador') }}
            {{ Form::text('n_identificador', $empresa->n_identificador, ['class' => 'form-control' . ($errors->has('n_identificador') ? ' is-invalid' : ''), 'placeholder' => 'N Identificador']) }}
            {!! $errors->first('n_identificador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('n_empleador_caja') }}
            {{ Form::text('n_empleador_caja', $empresa->n_empleador_caja, ['class' => 'form-control' . ($errors->has('n_empleador_caja') ? ' is-invalid' : ''), 'placeholder' => 'N Empleador Caja']) }}
            {!! $errors->first('n_empleador_caja', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nim') }}
            {{ Form::text('nim', $empresa->nim, ['class' => 'form-control' . ($errors->has('nim') ? ' is-invalid' : ''), 'placeholder' => 'Nim']) }}
            {!! $errors->first('nim', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('repre_legal') }}
            {{ Form::text('repre_legal', $empresa->repre_legal, ['class' => 'form-control' . ($errors->has('repre_legal') ? ' is-invalid' : ''), 'placeholder' => 'Repre Legal']) }}
            {!! $errors->first('repre_legal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ci_repre_legal') }}
            {{ Form::text('ci_repre_legal', $empresa->ci_repre_legal, ['class' => 'form-control' . ($errors->has('ci_repre_legal') ? ' is-invalid' : ''), 'placeholder' => 'Ci Repre Legal']) }}
            {!! $errors->first('ci_repre_legal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion') }}
            {{ Form::text('direccion', $empresa->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $empresa->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();"> Guardar</button>
        <a href="{{ route('empresas.index') }}" class="btn btn-danger"> <i class="fa fa-users"></i> Listado</a>
    </div>
</div>
