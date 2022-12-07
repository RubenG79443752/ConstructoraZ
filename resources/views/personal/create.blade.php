@extends('layouts.app')

@section('template_title')
    Crear personal
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear personal</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('personals.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('personal.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
