@extends('layouts.app')

@section('template_title')
    {{ $personal->name ?? 'Detalle personal' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle personal</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('personals.index') }}"> Retornar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Doc Identidad:</strong>
                            {{ $personal->doc_identidad }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $personal->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Primer Apellido:</strong>
                            {{ $personal->primer_apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Segundo Apellido:</strong>
                            {{ $personal->segundo_apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Nacimiento:</strong>
                            {{ $personal->fecha_nacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Sexo:</strong>
                            {{ $personal->sexo }}
                        </div>
                        <div class="form-group">
                            <strong>Pais de nacionalidad:</strong>
                            {{ $personal->pai->pais }}
                        </div>
                        <div class="form-group">
                            <strong>Cargo:</strong>
                            {{ $personal->cargo->cargo }}
                        </div>
                        <div class="form-group">
                            <strong>Horario:</strong>
                            {{ $personal->horario->horario_ini.' - '.$personal->horario->horario_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Contrato:</strong>
                            {{ $personal->contratacion->referencia_contrato }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $personal->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
