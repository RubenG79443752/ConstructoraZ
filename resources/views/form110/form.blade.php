<div class="box box-info padding-1">
    <div class="box-body">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Personal') !!}
                {!! Form::select('personal_id', $personal, (isset($form110->personal_id))? $form110->personal_id:null, ['class' => 'form-select form-select-sm','id'=>'personal_id','required']) !!}
                {!! $errors->first('personal_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $form110->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => '...']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('mes') }}
            <select class="form-select form-select-sm" name="mes" id="mes">
                <option value="Enero" @if(old('mes', $form110->mes) === 'Enero')  selected @endif>Enero</option>
                <option value="Febrero" @if(old('mes', $form110->mes) === 'Febrero')  selected @endif>Febrero</option>
                <option value="Marzo" @if(old('mes', $form110->mes) === 'Marzo')  selected @endif>Marzo</option>
                <option value="Abril" @if(old('mes', $form110->mes) === 'Abril')  selected @endif>Abril</option>
                <option value="Mayo" @if(old('mes', $form110->mes) === 'Mayo')  selected @endif>Mayo</option>
                <option value="Junio" @if(old('mes', $form110->mes) === 'Junio')  selected @endif>Junio</option>
                <option value="Julio" @if(old('mes', $form110->mes) === 'Julio')  selected @endif>Julio</option>
                <option value="Agosto" @if(old('mes', $form110->mes) === 'Agosto')  selected @endif>Agosto</option>
                <option value="Septiembre" @if(old('mes', $form110->mes) === 'Septiembre')  selected @endif>Septiembre</option>
                <option value="Octubre" @if(old('mes', $form110->mes) === 'Octubre')  selected @endif>Octubre</option>
                <option value="Noviembre" @if(old('mes', $form110->mes) === 'Noviembre')  selected @endif>Noviembre</option>
                <option value="Diciembre" @if(old('mes', $form110->mes) === 'Diciembre')  selected @endif>Diciembre</option>
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('Periodo') }}
            <select class="form-select form-select-sm" name="periodo" id="periodo">
                <option value="2022" @if(old('periodo', $form110->periodo) === '2022')  selected @endif>2022</option>
                <option value="2023" @if(old('periodo', $form110->periodo) === '2023')  selected @endif>2023</option>
                <option value="2024" @if(old('periodo', $form110->periodo) === '2024')  selected @endif>2024</option>
                <option value="2025" @if(old('periodo', $form110->periodo) === '2025')  selected @endif>2025</option>
                <option value="2026" @if(old('periodo', $form110->periodo) === '2026')  selected @endif>2026</option>
                <option value="2027" @if(old('periodo', $form110->periodo) === '2027')  selected @endif>2027</option>
                <option value="2028" @if(old('periodo', $form110->periodo) === '2028')  selected @endif>2028</option>
                <option value="2029" @if(old('periodo', $form110->periodo) === '2029')  selected @endif>2029</option>
                <option value="2030" @if(old('periodo', $form110->periodo) === '2030')  selected @endif>2030</option>
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('monto_favor') }}
            {{ Form::number('monto_favor', $form110->monto_favor, ['class' => 'form-control' . ($errors->has('monto_favor') ? ' is-invalid' : ''), 'min' => 0,'step'=>'any']) }}
            {!! $errors->first('monto_favor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Subir PDF') }}
            <input type="file" class="form-control" id="form110" name="form110" accept="application/pdf"/>
            {!! $errors->first('form110', '<div class="invalid-feedback">:message</div>') !!}
            @if ($accion == 'modificar')
            <a href="{{ asset('storage/'.$form110->form110) }}" class="text-decoration-none" target="_blank">Ver formulario anterior</a>
            <div class="col-md-2 mt-2"><img src="{{ asset('storage/'.$form110->form110) }}" alt="" width="120"></div>
            @endif

            {!! Form::hidden('user_id',$usuario,['class' => 'form-control','id'=>'user_id']) !!}
        </div>
    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();"> Guardar</button>
        <a href="{{ route('form110s.index') }}" class="btn btn-danger"> <i class="fa fa-users"></i> Listado</a>
    </div>
</div>
