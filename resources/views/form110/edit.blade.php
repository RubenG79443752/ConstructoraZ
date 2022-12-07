@extends('layouts.app')

@section('template_title')
    Actualizar Formulario 110
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Formulario 110</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('form110s.update', $form110->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('form110.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
