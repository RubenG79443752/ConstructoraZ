
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('documento de identidad') }}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text"><i class="bi bi-credit-card-2-front-fill"></i></span>
                        {{ Form::text('doc_identidad', $personal->doc_identidad, ['class' => 'form-control' . ($errors->has('doc_identidad') ? ' is-invalid' : ''), 'placeholder' => '00000000']) }}
                        {!! $errors->first('doc_identidad', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
            
            
            <head>
    
                    <script>
     $(document).ready( function () {
      $("input").on("keypress", function () {
       $input=$(this);
       setTimeout(function () {
        $input.val($input.val().toUpperCase());
       },50);
      })
     })
    </script>
                     
           
<div class="col-md-12"></div>
            <div class="col-md-3">
                <div class="form-group" >
                    {{ Form::label('nombre') }}
                    {{ Form::text ('nombre', $personal->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre completo']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            </head>
            
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('primer_apellido') }}
                {{ Form::text('primer_apellido', $personal->primer_apellido, ['class' => 'form-control' . ($errors->has('primer_apellido') ? ' is-invalid' : ''), 'placeholder' => '-']) }}
                {!! $errors->first('primer_apellido', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('segundo_apellido') }}
                {{ Form::text('segundo_apellido', $personal->segundo_apellido, ['class' => 'form-control' . ($errors->has('segundo_apellido') ? ' is-invalid' : ''), 'placeholder' => '-']) }}
                {!! $errors->first('segundo_apellido', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-md-12"></div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('fecha_nacimiento') }}
                {{ Form::text('fecha_nacimiento', $personal->fecha_nacimiento, ['class' => 'form-control' . ($errors->has('fecha_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'AÑO-MES-DIA']) }}
                {!! $errors->first('fecha_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('sexo') }}
                <select class="form-select" name="sexo" id="sexo">
                    <option value="M" @if(old('sexo', $personal->sexo) === 'M')  selected @endif>Masculino</option>
                    <option value="F" @if(old('sexo', $personal->sexo) === 'F')  selected @endif>Femenino</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('Domicilio') }}
                {{ Form::text('domicilio', $personal->domicilio, ['class' => 'form-control' . ($errors->has('domicilio') ? ' is-invalid' : ''), 'placeholder' => '-']) }}
                {!! $errors->first('domicilio', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-md-12"></div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('Pais de nacionalidad') !!}
                {!! Form::select('pais_id', $paices, (isset($personal->pais_id))? $personal->pais_id:null, ['class' => 'form-select'. ($errors->has('pais_id') ? ' is-invalid' : '')]) !!}
                {!! $errors->first('pais_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('Cargo') !!}
                {!! Form::select('cargo_id', $cargos, (isset($personal->cargo_id))? $personal->cargo_id:null, ['class' => 'form-select'. ($errors->has('cargo_id') ? ' is-invalid' : '')]) !!}
                {!! $errors->first('cargo_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('estado') }}
                <select class="form-select" name="estado" id="estado">
                    <option value="Activo" @if(old('estado', $personal->estado) === 'Activo')  selected @endif>Activo</option>
                    <option value="Inactivo" @if(old('estado', $personal->estado) === 'Inactivo')  selected @endif>Inactivo</option>
                </select>
            </div>
            {{ Form::hidden('saldo_anterior', isset($personal->saldo_anterior)? $personal->saldo_anterior:0, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary" this.value='Enviando...';this.form.submit();"> Guardar</button>
        <a href="{{ route('personals.index') }}" class="btn btn-danger"> <i class="fa fa-users"></i> Listado</a>
    </div>
</div>
</div>
</div>
