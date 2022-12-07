<div class="box box-info padding-1">
    <div class="box-body">
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('Personal') !!}
                {!! Form::select('personal_id', $personal, (isset($contratacion->personal_id))? $contratacion->personal_id:null, ['class' => 'form-select form-select-sm','id'=>'personal_id']) !!}
                {!! $errors->first('personal_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('Contrato') }}
            <input type="file" class="form-control" id="contrato" name="contrato" accept="image/*"/>
            {!! $errors->first('contrato', '<div class="invalid-feedback">:message</div>') !!}
            @if ($accion == 'modificar')
            <a href="{{ asset('storage/'.$contratacion->contrato) }}" class="text-decoration-none" target="_blank">Ver Contrato anterior</a>
            <div class="col-md-2 mt-2"><img src="{{ asset('storage/'.$contratacion->contrato) }}" alt="" width="120"></div>
            @endif
        </div>
        <div class="form-group">
            {{ Form::label('referencia_contrato') }}
            {{ Form::text('referencia_contrato', $contratacion->referencia_contrato, ['class' => 'form-control' . ($errors->has('referencia_contrato') ? ' is-invalid' : ''), 'placeholder' => 'Ref.']) }}
            {!! $errors->first('referencia_contrato', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_ingreso') }}
            {{ Form::date('fecha_ingreso', $contratacion->fecha_ingreso, ['class' => 'form-control' . ($errors->has('fecha_ingreso') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Ingreso']) }}
            {!! $errors->first('fecha_ingreso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sueldo_inicial') }}
            {{ Form::number('sueldo_inicial', $contratacion->sueldo_inicial, ['class' => 'form-control' . ($errors->has('sueldo_inicial') ? ' is-invalid' : ''), 'placeholder' => '0','min'=>'0','step'=>'any']) }}
            {!! $errors->first('sueldo_inicial', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('garantia') }}
            {{ Form::text('garantia', $contratacion->garantia, ['class' => 'form-control' . ($errors->has('garantia') ? ' is-invalid' : ''), 'placeholder' => '-']) }}
            {!! $errors->first('garantia', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('Empresa') !!}
            {!! Form::select('empresa_id', $empresas, (isset($contratacion->empresa_id))? $contratacion->empresa_id:null, ['class' => 'form-control'. ($errors->has('empresa_id') ? ' is-invalid' : '')]) !!}
            {!! $errors->first('empresa_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();"> Guardar</button>
        <a href="{{ route('contratacions.index') }}" class="btn btn-danger"> <i class="fa fa-users"></i> Listado</a>
    </div>
</div>
