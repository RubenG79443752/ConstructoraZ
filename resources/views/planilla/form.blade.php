<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('Personal') !!}
                {!! Form::select('personal_id', $personal, (isset($planilla->personal_id))? $planilla->personal_id:null, ['class' => 'form-select form-select-sm','id'=>'personal_id']) !!}
                {!! $errors->first('personal_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {{ Form::label('mes') }}
                <select class="form-select form-select-sm" name="mes" id="mes">
                    <option value="Enero" @if(old('mes', $planilla->mes) === 'Enero')  selected @endif>Enero</option>
                    <option value="Febrero" @if(old('mes', $planilla->mes) === 'Febrero')  selected @endif>Febrero</option>
                    <option value="Marzo" @if(old('mes', $planilla->mes) === 'Marzo')  selected @endif>Marzo</option>
                    <option value="Abril" @if(old('mes', $planilla->mes) === 'Abril')  selected @endif>Abril</option>
                    <option value="Mayo" @if(old('mes', $planilla->mes) === 'Mayo')  selected @endif>Mayo</option>
                    <option value="Junio" @if(old('mes', $planilla->mes) === 'Junio')  selected @endif>Junio</option>
                    <option value="Julio" @if(old('mes', $planilla->mes) === 'Julio')  selected @endif>Julio</option>
                    <option value="Agosto" @if(old('mes', $planilla->mes) === 'Agosto')  selected @endif>Agosto</option>
                    <option value="Septiembre" @if(old('mes', $planilla->mes) === 'Septiembre')  selected @endif>Septiembre</option>
                    <option value="Octubre" @if(old('mes', $planilla->mes) === 'Octubre')  selected @endif>Octubre</option>
                    <option value="Noviembre" @if(old('mes', $planilla->mes) === 'Noviembre')  selected @endif>Noviembre</option>
                    <option value="Diciembre" @if(old('mes', $planilla->mes) === 'Diciembre')  selected @endif>Diciembre</option>
                </select>
            </div>
        </div>
         <div class="col-md-2">
            {{ Form::hidden('anio', isset($planilla->anio)? $planilla->anio:2022, ['id'=>'anio','class' => 'form-control form-control-sm' . ($errors->has('anio') ? ' is-invalid' : ''), 'placeholder' => '0','min'=>'0']) }}
        </div>
        <div class="col-md-4">
            <div class="alert alert-info" role="alert" id="respuesta">
                ...
            </div>
        </div>
        <div class="col-md-12"><hr></div>
        <div class="col-md-1 pe-0">
        <div class="form-group">
            {{ Form::label('horas') }}
            {{ Form::number('horas_pagadas', isset($planilla->horas_pagadas)? $planilla->horas_pagadas:8, ['id'=>'horas_pagadas','class' => 'form-control form-control-sm' . ($errors->has('horas_pagadas') ? ' is-invalid' : ''), 'placeholder' => '0','min'=>'0','step'=>'any']) }}
            {!! $errors->first('horas_pagadas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         </div>
        <div class="col-md-1 pe-0 ps-1">
        <div class="form-group">
            {{ Form::label('dias') }}
            {{ Form::number('dias_pagados', isset($planilla->dias_pagados)? $planilla->dias_pagados:30, ['id'=>'dias_pagados','class' => 'form-control form-control-sm' . ($errors->has('dias_pagados') ? ' is-invalid' : ''), 'placeholder' => '0','min'=>'0','step'=>'any']) }}
            {!! $errors->first('dias_pagados', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         </div>
        <div class="col-md-1 pe-0 ps-1">
        <div class="form-group">
            {{ Form::label('haber_basico') }}
            {{ Form::number('haber_basico', $planilla->haber_basico, ['id'=>'haber_basico','class' => 'form-control form-control-sm' . ($errors->has('haber_basico') ? ' is-invalid' : ''), 'placeholder' => '0','min'=>'0','step'=>'any']) }}
            {!! $errors->first('haber_basico', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         </div>
        <div class="col-md-1 pe-0 ps-1">
        <div class="form-group">
            {{ Form::label('bono_ant.') }}
            {{ Form::number('bono_antiguedad', $planilla->bono_antiguedad, ['id'=>'bono_antiguedad','class' => 'form-control form-control-sm' . ($errors->has('bono_antiguedad') ? ' is-invalid' : ''), 'placeholder' => '0','min'=>'0','step'=>'any']) }}
            {!! $errors->first('bono_antiguedad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         </div>
        <div class="col-md-1 pe-0 ps-1">
        <div class="form-group">
            {{ Form::label('h_extra') }}
            {{ Form::number('trabajo_extra_nocturno', $planilla->trabajo_extra_nocturno, ['id'=>'trabajo_extra_nocturno','class' => 'form-control form-control-sm' . ($errors->has('trabajo_extra_nocturno') ? ' is-invalid' : ''), 'placeholder' => '0','min'=>'0','step'=>'any']) }}
            {!! $errors->first('trabajo_extra_nocturno', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         </div>
        <div class="col-md-1 pe-0 ps-1">
        <div class="form-group">
            {{ Form::label('total_ganado') }}
            {{ Form::number('total_ganado', $planilla->total_ganado, ['id'=>'total_ganado','class' => 'form-control form-control-sm' . ($errors->has('total_ganado') ? ' is-invalid' : ''), 'placeholder' => '0','min'=>'0','step'=>'any']) }}
            {!! $errors->first('total_ganado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         </div>
        <div class="col-md-1 pe-0 ps-1">
        <div class="form-group">
            {{ Form::label('afps') }}
            {{ Form::number('afps', $planilla->afps, ['id'=>'afps','class' => 'form-control form-control-sm' . ($errors->has('afps') ? ' is-invalid' : ''), 'placeholder' => '0','min'=>'0','step'=>'any']) }}
            {!! $errors->first('afps', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         </div>
        <div class="col-md-1 pe-0 ps-1">
        <div class="form-group">
            {{ Form::label('rc_iva') }}
            {{ Form::number('rc_iva', $planilla->rc_iva, ['id'=>'rc_iva','class' => 'form-control form-control-sm' . ($errors->has('rc_iva') ? ' is-invalid' : ''), 'placeholder' => '0','min'=>'0','step'=>'any']) }}
            {!! $errors->first('rc_iva', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         </div>
        <div class="col-md-1 pe-0 ps-1">
        <div class="form-group">
            {{ Form::label('otros_desc.') }}
            {{ Form::number('otros_descuentos', isset($planilla->otros_descuentos)? $planilla->otros_descuentos:0, ['id'=>'otros_descuentos','class' => 'form-control form-control-sm' . ($errors->has('otros_descuentos') ? ' is-invalid' : ''), 'placeholder' => '0','min'=>'0','step'=>'any']) }}
            {!! $errors->first('otros_descuentos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         </div>
        <div class="col-md-1 pe-0 ps-1">
        <div class="form-group">
            {{ Form::label('total_desc.') }}
            {{ Form::number('total_descuentos', $planilla->total_descuentos, ['id'=>'total_descuentos','class' => 'form-control form-control-sm' . ($errors->has('total_descuentos') ? ' is-invalid' : ''), 'placeholder' => '0','min'=>'0','step'=>'any']) }}
            {!! $errors->first('total_descuentos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         </div>
        <div class="col-md-1 pe-0 ps-1">
        <div class="form-group">
            {{ Form::label('liq_pagable') }}
            {{ Form::number('liquido_pagable', $planilla->liquido_pagable, ['id'=>'liquido_pagable','class' => 'form-control form-control-sm' . ($errors->has('liquido_pagable') ? ' is-invalid' : ''), 'placeholder' => '0','min'=>'0','step'=>'any']) }}
            {!! $errors->first('liquido_pagable', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         </div>
         <div class="col-md-1 ps-1">
            <div class="form-group">
                {{ Form::label('estado') }}
                <select class="form-select form-select-sm" name="estado" id="estado">
                    <option value="Activo" @if(old('estado', $planilla->estado) === 'Activo')  selected @endif>Activo</option>
                    <option value="Inactivo" @if(old('estado', $planilla->estado) === 'Inactivo')  selected @endif>Inactivo</option>
                </select>
            </div>
        </div>
        <div class="col-md-12"> <h4><hr>Cálculos adicionales</h4></div>
        <div class="col-md-12">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-asistencia-tab" data-bs-toggle="pill" data-bs-target="#pills-asistencia" type="button" role="tab" aria-controls="pills-asistencia" aria-selected="true">Asistencia</button>
                  </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-bono-antiguedad-tab" data-bs-toggle="pill" data-bs-target="#pills-bono-antiguedad" type="button" role="tab" aria-controls="pills-bono-antiguedad" aria-selected="true">Bono antigüedad</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-horas-extra-tab" data-bs-toggle="pill" data-bs-target="#pills-horas-extra" type="button" role="tab" aria-controls="pills-horas-extra" aria-selected="false">Horas extra</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-afps-tab" data-bs-toggle="pill" data-bs-target="#pills-afps" type="button" role="tab" aria-controls="pills-afps" aria-selected="false">AFP's</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-iva-tab" data-bs-toggle="pill" data-bs-target="#pills-iva" type="button" role="tab" aria-controls="pills-iva" aria-selected="false">RC-IVA</button>
                  </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-asistencia" role="tabpanel" aria-labelledby="pills-asistencia-tab" tabindex="0">
                    <div class="table-responsive">
                        <div id="tabla-asistencia">
                            <div class="alert alert-success" id="mensaje_asistencia">Seleccionar Personal...</div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-bono-antiguedad" role="tabpanel" aria-labelledby="pills-bono-antiguedad-tab" tabindex="0">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td> <b>Años</b> </td>
                                        <td> <b>Porcentaje</b> </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>menor a 2</td>
                                        <td>0%</td>
                                    </tr>
                                    <tr>
                                        <td>2 - 4</td>
                                        <td>5%</td>
                                    </tr>
                                    <tr>
                                        <td>5 - 7</td>
                                        <td>11%</td>
                                    </tr>
                                    <tr>
                                        <td>8 - 10</td>
                                        <td>18%</td>
                                    </tr>
                                    <tr>
                                        <td>11 - 14</td>
                                        <td>26%</td>
                                    </tr>
                                    <tr>
                                        <td>15 - 19</td>
                                        <td>34%</td>
                                    </tr>
                                    <tr>
                                        <td>20 - 24</td>
                                        <td>42%</td>
                                    </tr>
                                    <tr>
                                        <td>25 o más</td>
                                        <td>50%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h4>Bono Antigüeda</h4>
                            <p><b>Fecha de ingreso: <span id="fecha_ingreso">0</span></b></p>
                            <p><b>Antigüedad (años):  <span id="antiguedad">0</span></b></p>
                            <p><b>Porcentaje correspondiente:  <span id="porcentaje">0</span>%</b></p>

                            <p><b>Salario mínimo nacional:  <span id="smn">0</span></b></p>
                            <p><b>3 Salario mínimo nacional:  <span id="smn_3">0</span></b></p>

                            <p><b>Resultado Bono Antigüeda:  <span id="resultado_bono_anti" style="font-size: 1.5em;" class="p-1 bg-warning">0</span></b></p>

                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="pills-horas-extra" role="tabpanel" aria-labelledby="pills-horas-extra-tab" tabindex="0">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Horas extra</h4>
                            <p><b>Haber Básico:  <span id="haber_basico_hr" style="font-size: 1.5em;" class="p-1 bg-warning">0</span></b></p>

                            <p>A = HB / 30 dias => <b><span id="dias"> 0 </span></b></p>
                            <p>B = A / 8 horas => <b><span id="horas"> 0 </span></b></p>
                            <p>C = B * 2 => <b><span id="doble"> 0 </span></b></p>
                            <p>D = C * HExtra => <b><span id="hrs_trabajadas"> 0 </span></b> * <span id="total_hrs_trabajadas" class="p-1 bg-info"> por calcular </span></p>

                            <p><b>Hrs. Extra = D =>  <span id="hrs_extra" style="font-size: 1.5em;" class="p-1 bg-warning">0</span></b></p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-afps" role="tabpanel" aria-labelledby="pills-afps-tab" tabindex="0">
                    <div class="table-responsive">
                        <table class="table table-bordered border-primary" style="font-size: 12px;">
                            <tr>
                                <td>Total Ganado</td>
                                <td>Cotización mensual</td>
                                <td>Prima riesgo común</td>
                                <td>Comisión AFP</td>
                                <td>Ap. Laboral Solidario 0.5%</td>
                                <td>Total Ap. AFP</td>
                                <td>Ans. para TG>13 mil (1%)</td>
                                <td>Ans. para TG>25 mil (5%)</td>
                                <td>Ans. para TG>35 mil (10%)</td>
                                <td>Total Ap. Nal. Solidario</td>
                                <td>Total mensual</td>
                            </tr>
                            <tr style="background: rgba(95, 195, 235, 0.918); font-size:11px;font-weight: bold">
                                <td>A</td>
                                <td>B=A*10%</td>
                                <td>C=A*1.71%</td>
                                <td>D=A*0.5%</td>
                                <td>E=A*0.5%</td>
                                <td>F=B+C+D+E</td>
                                <td>G</td>
                                <td>H</td>
                                <td>I</td>
                                <td>J=G+H+I</td>
                                <td>K=F+J</td>
                            </tr>
                            <tr>
                                <td><span id="afp1">0</span></td>
                                <td><span id="afp2">0</span></td>
                                <td><span id="afp3">0</span></td>
                                <td><span id="afp4">0</span></td>
                                <td><span id="afp5">0</span></td>
                                <td><span id="afp6">0</span></td>
                                <td><span id="afp7">0</span></td>
                                <td><span id="afp8">0</span></td>
                                <td><span id="afp9">0</span></td>
                                <td><span id="afp10">0</span></td>
                                <td><span id="afp11">0</span></td>
                            </tr>
                        </table>
                        </div>
                </div>
                <div class="tab-pane fade" id="pills-iva" role="tabpanel" aria-labelledby="pills-iva-tab" tabindex="0">
                    <div class="table-responsive">
                    <table class="table table-bordered border-primary" style="font-size: 12px;">
                        <tr>
                            <td>Monto de ingreso neto</td>
                            <td>RC-IVA</td>
                            <td>Form 110</td>
                            <td>Saldo mes anterior</td>
                            <td>Impuesto</td>
                            <td>Saldo a favor para el siguiente mes</td>
                        </tr>
                        <tr style="background: rgba(95, 195, 235, 0.918); font-size:10px;font-weight: bold">
                            <td>A=TG-AFP</td>
                            <td>B= (13%)</td>
                            <td>C = F110</td>
                            <td>D = S-ANTE</td>
                            <td>E = B - (C + D)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="number" class="calc" style="width: 9em" name="iva_1" id="iva_1" value="0" step="any" min="0"></td>
                            <td><input type="number" class="calc" style="width: 9em" name="iva_2" id="iva_2" value="0" step="any" min="0"></td>
                            <td><input type="number" class="calc" style="width: 9em" name="iva_3" id="iva_3" value="0" step="any" min="0"></td>
                            <td><input type="number" class="calc" style="width: 9em" name="iva_32" id="iva_32" value="0" step="any" min="0"></td>
                            <td><input type="number" class="calc" style="width: 9em" name="iva_33" id="iva_33" value="0" step="any" min="0"></td>
                            <td><input type="number" class="calc" style="width: 9em" name="iva_4" id="iva_4" value="0" step="any" min="0"></td>
                        </tr>
                    </table>
                    </div>
                </div>
              </div>
        </div>
        <div class="col-md-12"><hr></div>
        </div>
        </div>
    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();"> Guardar</button>
        <a href="{{ route('planillas.index') }}" class="btn btn-danger"> <i class="fa fa-users"></i> Listado</a>
        <a href="{{ route('menu_sueldos') }}" class="btn btn-success"> <i class="bi bi-house-fill"></i> Menu de opciones</a>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(document).on('change','#personal_id',function(){

                var id      = $(this).val();
                var mes  = $('#mes').val();
                var anio  = $('#anio').val();
                var url     = '{{ route('obtener_personal') }}';
                enviarDatos(id,mes,anio,url);

        });
        $(document).on('change','#iva_3',function(){
            var a = Number($('#iva_2').val());
            var b = Number($(this).val());
            var sal_anterior = Number($('#iva_32').val());

            var result = a - (b + sal_anterior);
            if(result <= 0 ){
                $('#iva_33').val(0);
            }else{
                $('#iva_33').val(result.toFixed(2));
                $('#rc_iva').val(result.toFixed(2));
            }

            if(result < 0 ){
                var abs = Math.abs(result);
                $('#iva_4').val(abs.toFixed(2));
            }
            else{
                $('#iva_4').val(0);
            }
            // Liquido pagable
            var afps = Number($('#afps').val());
            var rc_iva = Number($('#rc_iva').val());
            var o_descu = Number($('#otros_descuentos').val());

            var recalculo = afps + rc_iva + o_descu;
            $('#total_descuentos').val(recalculo);
            var tganado = Number($('#total_ganado').val());
            var tdescuento = Number($('#total_descuentos').val());
            var liquido_pag = tganado - tdescuento;
            $('#liquido_pagable').val(liquido_pag);
        });
    });
    var myVar;
    function enviarDatos(id,mes,anio,url){
        $.ajax({
            url : url,
            data: {
            "_token": "{{ csrf_token() }}",
            "id": id,
            "mes": mes,
            "anio": anio
            },
            type: 'post',
            dataType: 'json',
            success: function(data)
            {
                myVar = data.mensaje + " " + data.empleado;
                $('#respuesta').text(myVar);
                // Haber basico
                $('#haber_basico').val(data.haber_basico);
                $('#haber_basico_hr').text(data.haber_basico);
                // Asistencia
                $('#mensaje_asistencia').remove();
                $('#t_asistencia').remove();
                $('#tabla-asistencia').append (data.tabla_asistencia);
                // antiguedad
                    $('#fecha_ingreso').text(data.fecha_ingreso);

                    calcularAntiguedad(data.fecha_ingreso);
                    var aux = $('#antiguedad').text();
                    calcularPorcentaje(aux);
                    $('#smn').text(data.smn);
                    $('#smn_3').text( 3 * data.smn);
                    var porcent = $('#porcentaje').text();
                    var tresmn = $('#smn_3').text();
                    var resultado = tresmn * (porcent/100);
                    $('#resultado_bono_anti').text(resultado);
                    $('#bono_antiguedad').val(resultado);
                // Horas extra
                    $('#total_hrs_trabajadas').text(data.horas_extra);
                    h_ext = $('#total_hrs_trabajadas').text();
                    obtenerHorasExtra(data.haber_basico,h_ext);
                //total ganado
                    var HB = Number($('#haber_basico').val());
                    var BA = Number($('#bono_antiguedad').val());
                    var HE = Number($('#trabajo_extra_nocturno').val());
                    $('#total_ganado').val(HB + BA + HE);
                // calculo AFP
                    $('#afp1').text(data.haber_basico);
                    calcularAFP(data.haber_basico);
                    var TAFP = Number($('#afp6').text());
                    var TMES = Number($('#afp10').text());
                    var TOMES = TAFP + TMES;
                    $('#afp11').text(TOMES);
                    $('#afps').val(TOMES);
                // RC-IVA
                var SANTE = data.saldo_anterior;
                var SMN = data.smn;
                var SMN4 = SMN * 4;
                var INGNETO = data.haber_basico - TOMES;
                if (INGNETO > SMN4 ) {
                    var IVA = INGNETO * 0.13;
                    var F110 = $('#iva_3').val();
                    var IMPUESTO =  IVA - (F110 + SANTE);
                    $('#iva_1').val(INGNETO);
                    $('#iva_2').val(IVA.toFixed(2));
                    $('#iva_32').val(SANTE);
                    $('#iva_33').val(IMPUESTO.toFixed(2));
                    if(IMPUESTO < 0){
                        $('#iva_4').val(Math.abs(IMPUESTO));
                        $('#iva_33').val(0);
                    }else{
                        $('#iva_33').val(IMPUESTO.toFixed(2));
                        $('#rc_iva').val(IMPUESTO.toFixed(2));
                    }

                }else{
                    $('#iva_1').val(0);
                    $('#iva_2').val(0);
                    $('#iva_3').val(0);
                    $('#iva_33').val(0);
                    $('#iva_4').val(0);
                    $('#rc_iva').val(0);
                }
                // Total Descuento
                var afps = Number($('#afps').val());
                var rc_iva = Number($('#rc_iva').val());
                var otros_descuentos = Number($('#otros_descuentos').val());
                var total_descuentos = afps + rc_iva + otros_descuentos;
                $('#total_descuentos').val(total_descuentos);
                // Liquido pagable
                var tganado = Number($('#total_ganado').val());
                var tdescuento = Number($('#total_descuentos').val());
                var liquido_pag = tganado - tdescuento;
                $('#liquido_pagable').val(liquido_pag);
            },
            error: function()
            {
                alert('Ups ocurrio un problema');

            }
        });
    }
    function calcularAntiguedad(fecha_ingreso) {
        fecha = fecha_ingreso;
        var hoy = new Date();
        var anios = new Date(fecha);
        var antiguedad = hoy.getFullYear() - anios.getFullYear();
        var m = hoy.getMonth() - anios.getMonth();

        if (m < 0 || (m === 0 && hoy.getDate() < anios.getDate())) {
            antiguedad--;
        }
        $('#antiguedad').text(antiguedad);
    }
    function calcularPorcentaje(antiguedad){
        if (antiguedad >= 2 && antiguedad <= 4) {
            $('#porcentaje').text('5');
        }
        else if(antiguedad >= 5 && antiguedad <= 7){
            $('#porcentaje').text('11');
        }
        else if(antiguedad >= 8 && antiguedad <= 10){
            $('#porcentaje').text('18');
        }
        else if(antiguedad >= 11 && antiguedad <= 14){
            $('#porcentaje').text('26');
        }
        else if(antiguedad >= 15 && antiguedad <= 19){
            $('#porcentaje').text('34');
        }
        else if(antiguedad >= 20 && antiguedad <= 24){
            $('#porcentaje').text('42');
        }
        else if(antiguedad >= 25){
            $('#porcentaje').text('50');
        }
        else{
            $('#porcentaje').text('0');
        }
    }
    function obtenerHorasExtra(haber_basico,horas_extra) {
            var dias = haber_basico/30;
            var horas = dias/8;
            var doble = horas * 2
            var resultado = doble * horas_extra;
            $('#dias').text(dias.toFixed(2));
            $('#horas').text(horas.toFixed(2));
            $('#doble').text(doble.toFixed(2));
            $('#hrs_trabajadas').text(resultado.toFixed(2));
            $('#total_hrs_trabajadas').text(horas_extra);


            $('#hrs_extra').text(resultado.toFixed(2));
            $('#trabajo_extra_nocturno').val(resultado.toFixed(2));
    }
    function calcularAFP(haber_basico){
        var afp2 = haber_basico * 0.1;
        var afp3 = haber_basico * 0.0171;
        var afp4 = haber_basico * 0.005;
        var afp5 = haber_basico * 0.005;

        var total = afp2 + afp3 + afp4 + afp5;
        $('#afp2').text(afp2);
        $('#afp3').text(afp3);
        $('#afp4').text(afp4);
        $('#afp5').text(afp5);

        $('#afp6').text(total.toFixed(2));

        var afp7 = 0;
        var afp8 = 0;
        var afp9 = 0;

        var ans = 0;

        if (haber_basico > 13000 && haber_basico < 25000) {
            afp7 = haber_basico * 0.01;
            $('#afp7').text(afp7.toFixed(2));
        }
        if (haber_basico > 25000 && haber_basico < 35000) {
            afp8 = haber_basico * 0.05;
            $('#afp8').text(afp8.toFixed(2));
        }
        if (haber_basico > 35000) {
            afp9 = haber_basico * 0.1;
            $('#afp9').text(afp9.toFixed(2));
        }
        ans = afp7 + afp8 + afp9;
        $('#afp10').text(ans);
    }
    </script>
