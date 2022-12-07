@extends('layouts.app')

@section('template_title')
    Generar Nomina de Asistencia
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Generar resumen de asistencia</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('nomina') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-2">
                                <div class="form-group">
                                    {{ Form::label('mes') }}
                                    <select class="form-select form-select-sm" name="mes" id="mes">
                                        {!! $option_mes !!}
                                    </select>
                                </div>
                            </div>
                             <div class="col-md-2">
                                <div class="form-group">
                                    {{ Form::label('Periodo') }}
                                    <select class="form-select form-select-sm" name="anio" id="anio">
                                        {!! $option_anio !!}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('Personal') !!}
                                    {!! Form::select('personal_id',$personal,(isset($personal_id))? $personal_id:null, ['class' => 'form-select form-select-sm','placeholder' => '--Todo--']) !!}
                                </div>
                            </div>
                            <div class="box-footer mt-2">
                                <button type="submit" class="btn btn-info" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();"> Generar resumen de asistencia</button>
                                <a href="{{ route('menu_asistencia') }}" class="btn btn-danger"> <i class="bi bi-house-fill"></i> Menu de opciones</a>

                            </div>

                        </form>

                    </div>
                    <div class="card-footer text-muted">
                        {!! $tabla !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
