@extends('layouts.app')

@section('template_title')
    {{ $variable->name ?? 'Detalle' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle de variable</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('variables.index') }}"> Retornar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $variable->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Valor:</strong>
                            {{ $variable->valor }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
