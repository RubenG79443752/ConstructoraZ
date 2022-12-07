@extends('layouts.app')

@section('template_title')
    Crear cargo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear cargo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cargos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('cargo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
