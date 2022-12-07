@extends('layouts.app')

@section('template_title')
    {{ $pai->name ?? 'Detalle' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pais.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Pais:</strong>
                            {{ $pai->pais }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
