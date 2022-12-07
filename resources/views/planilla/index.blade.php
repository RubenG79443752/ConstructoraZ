@extends('layouts.app')

@section('template_title')
    Planillas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Planillas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('planillas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear registro a planilla') }}
                                </a>
                                <a href="{{ url('menu_sueldos') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
                                    <i class="bi bi-house-fill"></i> {{ __('Menu de opciones') }}
                                  </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        @livewire('planilla-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
