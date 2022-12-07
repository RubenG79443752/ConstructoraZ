@extends('layouts.app')

@section('template_title')
    Actualizar Horario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-6 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Horario</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('horarios.update', $horario->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('horario.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
