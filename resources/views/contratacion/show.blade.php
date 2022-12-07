@extends('layouts.app')

@section('template_title')
    {{ $contratacion->name ?? 'Detalle contratacion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle contratacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('contratacions.index') }}"> Retornar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Contrato:</strong>
                            <a href="{{ asset('storage/'.$contratacion->contrato) }}" class="text-decoration-none" target="_blank"><img src="{{ asset('storage/'.$contratacion->contrato) }}" alt="" width="90"></a>
                        </div>
                        <div class="form-group">
                            <strong>Referencia de contrato:</strong>
                            {{ $contratacion->referencia_contrato }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Ingreso:</strong>
                            {{ $contratacion->fecha_ingreso }}
                        </div>
                        <div class="form-group">
                            <strong>Sueldo Inicial:</strong>
                            {{ $contratacion->sueldo_inicial }}
                        </div>
                        <div class="form-group">
                            <strong>Garantia:</strong>
                            {{ $contratacion->garantia }}
                        </div>
                        <div class="form-group">
                            <strong>Empresa Id:</strong>
                            {{ $contratacion->empresa_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
