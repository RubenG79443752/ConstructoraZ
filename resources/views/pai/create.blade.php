@extends('layouts.app')

@section('template_title')
    Crear pais de nacionalidad
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear pais de nacionalidad</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pais.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('pai.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
