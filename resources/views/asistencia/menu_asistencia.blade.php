@extends('layouts.app')

@section('template_title')
    Control de asistencias
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Control de asistencias</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="grafico"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                          <img src="{{ asset('nomina_personal.png') }}" class="card-img-top mx-auto d-block" alt="Registrar empleado a planilla" style="width:100px;">
                                        </div>
                                      <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Nómina de asistencia</h5>
                                            <p class="card-text">Nómina del personal, Generación de planilla con los nombres de los trabajadores</p>
                                            <a href="{{ url('index_nomina') }}" class="btn btn-info"><i class="bi bi-arrow-up-left-square-fill"></i> Ingresar</a>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="row g-0">
                                      <div class="col-md-4">
                                        <img src="{{ asset('administrar_asistencia.png') }}" class="card-img-top mx-auto d-block" alt="Generar planilla de sueldos" style="width:100px;">
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Administrar asistencia</h5>
                                            <p class="card-text">Faltas Justificadas, Permisos entre otros</p>
                                            <a href="{{ route('asistencias.index') }}" class="btn btn-info"><i class="bi bi-arrow-up-left-square-fill"></i> Ingresar</a>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="row g-0">
                                      <div class="col-md-4">
                                        <img src="{{ asset('exportar_excel.png') }}" class="card-img-top mx-auto d-block" alt="Generar boletas de pago" style="width:100px;">
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body">
                                          <h5 class="card-title">Exportar asistencia a excel</h5>
                                          <p class="card-text">Generar hoja excel de las asistencia del personal</p>
                                          <a href="{{ url('exportar') }}" class="btn btn-info"><i class="bi bi-arrow-up-left-square-fill"></i> Ingresar</a>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
    Highcharts.setOptions({
        colors: ['#64E572', '#24CBE5']
        })
        Highcharts.chart('grafico', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Asistencia e Inasistencia del personal para hoy dia'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: {!! $data !!}
        }]
    });
    </script>
@endsection
