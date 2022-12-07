@extends('layouts.app')

@section('template_title')
    {{ $permiso->name ?? 'Show Permiso' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Permiso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('permisos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Personal Id:</strong>
                            {{ $permiso->personal_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Permiso:</strong>
                            {{ $permiso->tipo_permiso }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $permiso->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Desde Fecha:</strong>
                            {{ $permiso->desde_fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hasta Fecha:</strong>
                            {{ $permiso->hasta_fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Horas:</strong>
                            {{ $permiso->horas }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
