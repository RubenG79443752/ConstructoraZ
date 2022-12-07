@extends('layouts.app')

@section('template_title')
    {{ $horario->name ?? 'Detalle Horario' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle de horario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('horarios.index') }}"> Retornar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Horario Inicial:</strong>
                            {{ $horario->horario_ini }}
                        </div>
                        <div class="form-group">
                            <strong>Horario Final:</strong>
                            {{ $horario->horario_fin }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
