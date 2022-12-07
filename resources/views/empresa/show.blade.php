@extends('layouts.app')

@section('template_title')
    {{ $empresa->name ?? 'Detalle empresa' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle empresa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empresas.index') }}"> Retornar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Logo:</strong>
                            <img src="{{ asset('storage/'.$empresa->logo) }}" alt="" width="90">

                        </div>
                        <div class="form-group">
                            <strong>Razon Social:</strong>
                            {{ $empresa->razon_social }}
                        </div>
                        <div class="form-group">
                            <strong>N Nit:</strong>
                            {{ $empresa->n_nit }}
                        </div>
                        <div class="form-group">
                            <strong>N Identificador:</strong>
                            {{ $empresa->n_identificador }}
                        </div>
                        <div class="form-group">
                            <strong>N Empleador Caja:</strong>
                            {{ $empresa->n_empleador_caja }}
                        </div>
                        <div class="form-group">
                            <strong>Nim:</strong>
                            {{ $empresa->nim }}
                        </div>
                        <div class="form-group">
                            <strong>Repre Legal:</strong>
                            {{ $empresa->repre_legal }}
                        </div>
                        <div class="form-group">
                            <strong>Ci Repre Legal:</strong>
                            {{ $empresa->ci_repre_legal }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $empresa->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $empresa->telefono }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
