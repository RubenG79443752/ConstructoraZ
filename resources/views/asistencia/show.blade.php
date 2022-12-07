@extends('layouts.app')

@section('template_title')
    {{ $asistencia->name ?? 'Show Asistencia' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Asistencia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('asistencias.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Lugartrabajo Id:</strong>
                            {{ $asistencia->lugartrabajo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Asitencia:</strong>
                            {{ $asistencia->fecha_asitencia }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Entrada:</strong>
                            {{ $asistencia->hora_entrada }}
                        </div>
                        <div class="form-group">
                            <strong>Long Entrada:</strong>
                            {{ $asistencia->long_entrada }}
                        </div>
                        <div class="form-group">
                            <strong>Lat Entrada:</strong>
                            {{ $asistencia->lat_entrada }}
                        </div>
                        <div class="form-group">
                            <strong>Estado Entrada:</strong>
                            {{ $asistencia->estado_entrada }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Salida:</strong>
                            {{ $asistencia->hora_salida }}
                        </div>
                        <div class="form-group">
                            <strong>Long Salida:</strong>
                            {{ $asistencia->long_salida }}
                        </div>
                        <div class="form-group">
                            <strong>Lat Salida:</strong>
                            {{ $asistencia->lat_salida }}
                        </div>
                        <div class="form-group">
                            <strong>Estado Salida:</strong>
                            {{ $asistencia->estado_salida }}
                        </div>
                        <div class="form-group">
                            <strong>Tardanza:</strong>
                            {{ $asistencia->tardanza }}
                        </div>
                        <div class="form-group">
                            <strong>Tiempo Laborado:</strong>
                            {{ $asistencia->tiempo_laborado }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Asistencia:</strong>
                            {{ $asistencia->tipo_asistencia }}
                        </div>
                        <div class="form-group">
                            <strong>Estado Final:</strong>
                            {{ $asistencia->estado_final }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
