@extends('layouts.app')

@section('template_title')
    {{ $form110->name ?? 'Show Form110' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Form110</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('form110s.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Personal Id:</strong>
                            {{ $form110->personal_id }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $form110->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Mes:</strong>
                            {{ $form110->mes }}
                        </div>
                        <div class="form-group">
                            <strong>Periodo:</strong>
                            {{ $form110->periodo }}
                        </div>
                        <div class="form-group">
                            <strong>Monto Favor:</strong>
                            {{ $form110->monto_favor }}
                        </div>
                        <div class="form-group">
                            <strong>Form110:</strong>
                            {{ $form110->form110 }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
