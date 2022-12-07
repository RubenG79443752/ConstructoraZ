@extends('layouts.app')

@section('template_title')
    Actualizar contratacion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar contratacion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('contratacions.update', $contratacion->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('contratacion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
