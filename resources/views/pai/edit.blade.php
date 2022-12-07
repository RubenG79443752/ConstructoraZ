@extends('layouts.app')

@section('template_title')
    Actualizar pais de nacionalidad
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-6 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar pais de nacionalidad</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pais.update', $pai->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('pai.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
