@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? 'Editar' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Rol:</strong>
                            {{ $user->rol }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario:</strong>
                            {{ $user->usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $user->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
