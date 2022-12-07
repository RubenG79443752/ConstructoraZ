@extends('layouts.app')

@section('template_title')
    Form110
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Form110</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('form110s.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('form110.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
