@extends('layouts.app')

@section('template_title')
    Crear Planilla
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Planilla</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('planilla_generada') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-2">
                                <div class="form-group">
                                    {{ Form::label('mes') }}
                                    <select class="form-select form-select-sm" name="mes" id="mes">
                                        <option value="Enero">Enero</option>
                                        <option value="Febrero">Febrero</option>
                                        <option value="Marzo">Marzo</option>
                                        <option value="Abril">Abril</option>
                                        <option value="Mayo">Mayo</option>
                                        <option value="Junio">Junio</option>
                                        <option value="Julio">Julio</option>
                                        <option value="Agosto">Agosto</option>
                                        <option value="Septiembre">Septiembre</option>
                                        <option value="Octurbre">Octurbre</option>
                                        <option value="Noviembre">Noviembre</option>
                                        <option value="Diciembre">Diciembre</option>
                                    </select>
                                </div>
                            </div>
                             <div class="col-md-2">
                                <div class="form-group">
                                    {{ Form::label('Periodo') }}
                                    <select class="form-select form-select-sm" name="anio" id="anio">
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                </div>
                            </div>
                            <div class="box-footer mt-2">
                                <button type="submit" class="btn btn-warning" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();"> Generar planilla</button>
                                <a href="{{ route('menu_sueldos') }}" class="btn btn-success"> <i class="bi bi-house-fill"></i> Menu de opciones</a>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
