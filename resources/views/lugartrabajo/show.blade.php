@extends('layouts.app')

@section('template_title')
    {{ $lugartrabajo->name ?? 'Detalle de lugar de trabajo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle de Lugar de trabajo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('lugartrabajos.index') }}"> Retornar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Personal</strong>
                            {{ $lugartrabajo->personal->nombre.' '.$lugartrabajo->personal->primer_apellido.' '.$lugartrabajo->personal->segundo_apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $lugartrabajo->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Logitud:</strong>
                            {{ $lugartrabajo->logitud }}
                        </div>
                        <div class="form-group">
                            <strong>Latitud:</strong>
                            {{ $lugartrabajo->latitud }}
                        </div>
                        <div class="form-group">
                            <strong>Radio:</strong>
                            {{ $lugartrabajo->radio }}
                        </div>
                        <div class="form-group">
                            <strong>Apertura Marcado:</strong>
                            {{ $lugartrabajo->apertura_marcado }}
                        </div>
                        <div class="form-group">
                            <strong>Cierre Marcado:</strong>
                            {{ $lugartrabajo->cierre_marcado }}
                        </div>
                        <div class="form-group">
                            <strong>Minutos Espera:</strong>
                            {{ $lugartrabajo->minutos_espera }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $lugartrabajo->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
